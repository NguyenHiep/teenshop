<?php
/* settings */
session_start();
$number_of_posts = 2; //2 at a time
$_SESSION['posts_start'] = $_SESSION['posts_start'] ? $_SESSION['posts_start'] : $number_of_posts;

/* loading of stuff */
if(isset($_GET['start'])) {
	/* spit out the posts within the desired range */
	$posts = get_posts($_GET['start'],$_GET['desiredPosts']);
	// decode the result to know the exact length of the result
	// It could be 2 in this case or less
	$postsDecoded = json_decode($posts);
	// If the result is not empty we update the session
	if (!empty($postsDecoded))
	{
		/* save the user's "spot", so to speak */
		$_SESSION['posts_start']+= count($postsDecoded);
	}
	echo get_posts($_GET['start'],$_GET['desiredPosts']);
	/* kill the page */
	die();
}

/* grab stuff */
function get_posts($start = 0, $number_of_posts = 2) {
	/* connect to the db */
	$connection = mysql_connect('localhost','root','');
	mysql_select_db('shop',$connection);
	$posts = array();
	/* get the posts */
	$query = "SELECT * FROM blog WHERE status = '1' ORDER BY post_on DESC LIMIT $start,$number_of_posts";
	$result = mysql_query($query);
	while($row = mysql_fetch_assoc($result)) {
		// Remove html tag and truncate the content
		$row['content'] = substr(strip_tags($row['content']), 0,200) . '...';
		$posts[] = $row;
	}
	/* return the posts in the JSON format */
	return json_encode($posts);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/mootools-core-1.4.5-full-nocompat-yc.js"></script>
<script type="text/javascript" src="js/mootools-more-1.4.0.1.js"></script>
<script type="text/javascript" src="js/mustache.js"></script>
<script type="text/javascript">
//domready event  
window.addEvent('domready',function() {
	// related to the demo page not the demo itself
	var scroll = new Fx.SmoothScroll({
		links: '.smoothAnchors',
		wheelStops: false,
		duration: 1000
	});

	/* DEMO */
	// initialize variables
	var start = <?php echo $_SESSION['posts_start']; ?>;
	var initialPosts = <?php echo get_posts(0,$_SESSION['posts_start']);  ?>;
	var desiredPosts = <?php echo $number_of_posts; ?>;
	// either null or contains the mustache template
	var template = null;
	// Widget element
	var widget = $('widget'),
	// Element to load the posts
	content = widget.getElement('.content'),
	// the more button
	more = widget.getElement('.more'),
	// the post counter
	counter = widget.getElement('.badge');
	// Create alerts elements (Display Success or Failure)
	var alerts = {
			templateFailure : new Element('div',{'class' : 'alert alert-error','html' : 'Could not get the template.'}),
			requestEmpty : new Element('div',{'class' : 'alert alert-info','html' : 'No more data'}),
			requestFailure : new Element('div',{'class' : 'alert alert-error','html' : 'Could not get the data. Try again!'})
	}
	// create the Bootstrap progress bar element
	var progressElement = new Element('div', {
		'class': 'progress',
		'html': "<div class='bar'></div>",
		'styles': {
			'margin-bottom' : 0
		}
	});
	var progressBar = progressElement.getElement('.bar');
	// Create a scroll instance on the widget content
	// This Class is included in Mootools More
	var scroll = new Fx.Scroll(content, {
		duration: 1000,
		wait: false
	});
	// function that handle posts
	var postHandler = function(data){
		// Check if the template is already stored
		if (!template){
			// If not we get it
			new Request({
				url: 'load-more.mustache',
				method: 'get',
				async: false,
				onSuccess: function(responseText){
					// the response text is stored as the template
					template = responseText;
				},
				onFailure: function() {
					// insert the failure message
					widget.grab(alerts.templateFailure,'before');
					// get rid of the widget
					widget.dispose();
				}
				// Send the Ajax request
			}).send();
		}
		else{
			// Set the progress bar to 100%
			progressBar.setStyle('width', '100%');
			// Delay the normal more button to come back for a better effect
			more.set.delay(500, more, ['html','More <span class="caret"></span>']);
		}
		// Transform the template (String) into Elements that we can use
		var childrens =  new Element('div', {
			// Mustache requires an object property to reference in order to
			// create loops
			'html' : Mustache.render(template, {'data' : data})
		}).getChildren('*');
		// insert childrens at the end of the content element
		content.adopt(childrens);
		// Scroll to the first element loaded
		scroll.toElement(childrens[0]);
	}
	// place the initial posts in the page
	postHandler(initialPosts);

	// create the data Ajax request
	var request = new Request.JSON({  
		url: 'load-more.php', // ajax script -- same page
		method: 'get',
		// Any calls made to start while the request is running will be ignored.
		link: 'ignore',
		// We do not want IE to cache the result
		noCache: true,  
		onRequest: function() {
			// Set the progress bar to 0%
			progressBar.setStyle('width', '0%');
			// remove the more button innerHTML and insert the progress bar
			more.empty().grab(progressElement);
		},
		onSuccess: function(responseJSON) {
			// Check if data is returned
			if (responseJSON.length > 0){
				// Update the total number of items
				start += responseJSON.length;
				// Update the counter
				counter.set('html', start);
				// load items on the page
				postHandler(responseJSON);
			}
			else{
				// insert the empty message
				widget.grab(alerts.requestEmpty,'before');
				// Set the progress bar to 100%
				progressBar.setStyle('width', '100%');
				// Remove the more button
				more.dispose.delay(500,more);
				// remove the empty message after 4 seconds
				alerts.requestEmpty.dispose.delay(4000,alerts.requestEmpty);
			}
		},
		onFailure: function() {
			// insert the failure message
			widget.grab(alerts.requestFailure,'before');
			// Set the progress bar to 100%
			progressBar.setStyle('width', '100%');
			// Delay the normal more button to come back for a better effect
			more.set.delay(500, more, ['html','More <span class="caret"></span>']);
		}
	});
	// add the click event to the more button
	more.addEvent('click',function(){  
		// begin the ajax attempt
		request.send({
			data: {  
				'start': start,  
				'desiredPosts': desiredPosts  
			} 
		});  
	});
});
</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="page-header">
					<h2 id="demo">Demo <small>Create a "load more" widget using PHP, Ajax, Mootools,
						Bootstrap and Mustache.js</small></h2>
				</div>
				<div class="row">
					<div class="span6">
						<div id="widget">
							<h4 id="widget-title">
								Widget Title <span class="badge badge-info"><?php echo $_SESSION['posts_start'] ?>
								</span>
							</h4>
							<div class="content"
								style="height: 300px; overflow: auto; margin: 0px;"></div>
							<button class="more btn btn-block">
								More <span class="caret"></span>
							</button>
						</div>
					</div>
					<div class="span6">
						<div class="btn-group">
							<a class="btn" target="_blank" href="http://julienrenaux.fr/2012/10/04/create-a-load-more-widget-using-php-ajax-mootools-bootstrap-and-mustache-js/">Back to the
								tutorial</a>
						</div>
						<hr />
						<p>
							<span class="label label-info">Heads up!</span> If "No more data"
							appears on top of the widget, it means you have reached the
							maximum number of item loaded. Please clear your session and try
							again :)
						</p>
						<hr />
						<div class="well">
							<ul class="nav nav-list">
								<li class="nav-header">Related projects</li>
								<li><a target="_blank" href="http://mootools.net/">Mootools</a>
								</li>
								<li><a target="_blank"
									href="http://twitter.github.com/bootstrap/index.html">Bootstrap</a>
								</li>
								<li><a target="_blank"
									href="https://github.com/janl/mustache.js">Mustache.js</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>
