<div class="post">

	<h2>Re-engagement Emails</h2>
	<h4>Posted: <date>14th May 2014</date></h4>

	<p>Today I'm going to show you some code which will re-engage users by sending them an email if a goal is not met. For example give them a 5% discount email if they do not complete the checkout process after an hour.</p>
	<p>There are three actions which we need to make, these are:</p>
	<ul>
		<li>Capture a potential target.</li>
		<li>Invalidate target if they achieve your goal (in this example the goal will be completing the checkout process.)</li>
		<li>Send targets who have not achieved the goal an email after X minutes have passed.</li>
	</ul>

	<h3>Why Do This?</h3>
	<p>Users are researching products on your website, maybe adding it to their cart, but then might decide to search for a better price somewhere, want to go into a physical store, or simply get annoyed with your checkout process.</p>
	<p>By capturing this users email address you can send them an email to remind them about items they have looked at, and maybe incentivise completing the checkout process.</p>

	<h3>Capturing the Email</h3>
	<p>The first step is to capture the data, this can be any email field on the website (such as a newsletter sign up box.) For our example we will assume the page has this element on it:</p>
<pre><code class="language-markup">&lt;form class=&quot;sign-up&quot; action=&quot;/sign-up&quot; method=&quot;POST&quot;&gt;
	&lt;input name=&quot;email&quot; type=&quot;email&quot; /&gt;
	&lt;button&gt;Sign Up!&lt;/button&gt;
&lt;/form&gt;</code></pre>
	<p>People may not submit the form, so we will capture the email address as soon as it is entered without worrying about the rest of the form. For this reason it may be worth making the email the first field they have to enter</p>
	<p>The code below will detect when an email address has been entered and will submit it to a processing page.</p>
	<p><strong>Note:</strong> The JavaScript code example here assume jQuery / Zepto are available.</p>
<pre><code class="language-javascript">// Detect when the email field has changed (when an email has been added.)
$('form.sign-up input[name=email]').on('change', function(event) {

	// Ensure it is a valid email (maybe not the most comprehensive regex, but it will work for this example)
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(event.target.value)) {

		$.post('./add-target.php', { email: event.target.value }, function(response){
			// We don't really care what the response is.
		});

	}

});</code></pre>
	<p>The last step here is to store the email address on our server, the code below is just a snippit - check the full example for more information, remember to ensure the target email can't be added to the table multiple times - in the full example I have made the email field unique in MySQL.</p>
<pre><code class="language-php">$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// Add target to table
$stmt = $mysqli->prepare('insert into `targets` (id, added, ip, email) values (0, ?, ?, ?)');
$stmt->bind_param('iss', $_SERVER['REQUEST_TIME'], $_SERVER['REMOTE_ADDR'], $email);
if ( ! $stmt->execute()) {
	// Maybe perform some logging, but we don't want to alert the user about any errors
}
$stmt->close();</code></pre>

	<h3>Invalidate the Target</h3>
	<p>It's important to remove the target from your table if they complete your goal (complete the checkout process.) This is simply achieved by removing the row from the table where the email address matches the user.</p>
	<pre><code class="language-php">$stmt = $mysqli->prepare('delete from `targets` where email = ?');</code></pre>
	<p>This could be done with an XHR call, or some custom code within your checkout process - searching for something along the lines of "SYSTEM post checkout hook" should get you started. (Note that if you go down the XHR route it could be open to abuse.)</p>

	<h3>Sending the Email</h3>
	<p>Now we have targets in our sights, it's time to send some emails. We are going to read each row from the <code class="language-sql">targets</code> table where the defined time frame has passed, we will then send a re-engagement email to each of those targets offering them a 5% discount for the next 24 hours. After sending the emails we will remove the row from the database.</p>
	<p>It is worth noting: the time frame for sending a re-engagement email will vary based on what are you selling, small impulsive stuff needs to be re-engaged much sooner than larger items the user may want to physically see in a shop.</p>
	<p>I am using output buffers to capture the output of a HTML email template which I am then sending with the default PHP mail function. You may want to use a more comprehensive PHP mailing solution like <a href="https://github.com/PHPMailer/PHPMailer" title="PHPMailer repository" data-analytics="PHPMailer repo">PHPMailer</a>.</p>
<pre><code class="language-php">ob_start();
require('./email.html');
$message = ob_get_clean();

if ( ! mail($target->email, $subject, $message, $headers)) {
	// Log errors, you want to make sure the emails are actually sent!
}</code></pre>

	<h3>Going Further</h3>
	<p>As you have probably realised there any many ways in which you could extend this, some examples I have thought of:</p>
	<ul>
		<p>Capturing more data from the user, their name will allow you to send them a more personal re-engagement email.</p>
		<li>Targetting people more specifically (perhaps a column in your database explaining how your obtained their email.)</li>
		<li>Capturing phone numbers and making more personal re-engagement.</li>
		<li>Preventing a user being re-engaged with this method more than once a month.</li>
		<li>Storing the products which were in the cart (or were viewed by the user) so you can generate a more personal re-engagement email.</li>
		<li>Triggering analytics events when the target is identified.</li>
		<li>After initially identifying the target, you could track each page they visit, identifying what they are interested in, and on what page they left.</li>
	</ul>
	<p>There are people far more qualified than me to talk about how to effectively re-engage users, take a look at <a href="http://moz.com/ugc/the-power-of-email-remarketing" title="The power of remargeting on Moz" data-analytics="The power of remargeting on Moz">the power of email remarketing</a> by Moz.</p>

	<h3>Full Example</h3>
	<p>You can view / use the example code however you like, it is <a href="https://github.com/joelvardy/re-engagement-emails" title="Re-engagement emails repository" data-analytics="Re-engagement emails repo">available on GitHub</a>.</p>

	<h3>Thanks</h3>
	<p>Thanks to <a href="https://twitter.com/eda49" title="Ed Baxter on Twitter">Ed Baxter</a> for the initial idea, insight, and proof reading, I did actually write some of this I promise ;)</p>

</div>
