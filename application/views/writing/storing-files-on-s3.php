<div class="post">

	<h2>Storing Files on Amazon S3</h2>
	<h4>Posted: <date>23rd July 2013</date></h4>

	<p>There are several reasons why you might not want to store files directly on the web server; <strong>scalability</strong> - where you have several web servers, <strong>disk IO</strong> - HDDs are a servers biggest performance bottle neck, or <strong>disk space</strong> - cloud storage is much more scalable.</p>
	<p>I'm going to show you how to store files on <a href="http://aws.amazon.com/s3/" title="Amazon Simple Storage Service">Amazon S3</a>, you will needs an Amazon Web Services account, and user credentials (access key ID and a secret access key) with access to your S3 buckets, for help on how to do this look at the <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_SettingUpUser.html" title="Adding an IAM User to Your AWS Account">Amazon AWS docs</a>.</p>

	<h3>Composer Awesomeness</h3>
	<p>I talked about Composer packages when I introduced my own <a href="/writing/restful-routes" title="RESTful Routes Package">RESTful Routes Package</a>, we will be using a composer package which makes managing files on Amazon S3 easy. Simply add <code class="language-markup">"tpyo/amazon-s3-php-class": "dev-master"</code> to your <code>composer.json</code> file, it should look something like:</p>
<pre><code class="language-markup">"require": {
	"tpyo/amazon-s3-php-class": "dev-master"
}</code></pre>

	<h3>Connecting to S3</h3>
	<p>All we have to do is instantiate the library, passing in the access key ID and secret access key, we can then use the libraries methods. The code below connects to your S3 account and tries to return an array of buckets:</p>
<pre><code class="language-php">// Autoload Composer
require('vendor/autoload.php');

// Instantiate S3 library
$s3 = new S3('ACCESS-KEY-ID', 'SECRET-ACCESS-KEY');

// Test connection
var_dump($s3->listBuckets());</code></pre>
	<p>If, when you load this in the browser, it returns <code class="language-markup">bool(false)</code> it may be one of the following issues:</p>
	<ul>
		<li>You haven't entered the correct access key ID or secret access key.</li>
		<li>The user doesn't have permission, you should give the user the "Amazon S3 Full Access" permission using Amazon AMI.</li>
	</ul>

	<h3>Uploading a File to S3</h3>
	<p>Generally this is the main operation you will want to perform. First you will need to ensure you have a bucket to upload to - you can create a bucket using Amazons S3 Management Console.</p>
	<p>We then want to use the <code class="language-php">putObject</code> and <code class="language-php">inputFile</code> methods to upload a local file to the S3 bucket. The example below assumes you have an image named "test.jpg" in the same folder as the running script:</p>
<pre><code class="language-php">// Upload an image from the server
var_dump($s3->putObject($s3->inputFile('test.jpg', false), 'BUCKET-NAME', 'it-worked.jpg', S3::ACL_PUBLIC_READ));</code></pre>
	<p>Assuming the above returned <code class="language-markup">bool(true)</code> when you look inside the bucket using the S3 Management Console you should see your image with the filename <strong>it-worked.jpg</strong>. In the management console you should see a URL, in my case this is <strong>https://s3-eu-west-1.amazonaws.com/BUCKET-NAME/it-worked.jpg</strong> - I'm sure you can work out what other URLs will be from this.</p>

	<h3>Organising Files Within your Bucket</h3>
	<p>While S3 doesn't support folders within buckets, it does allow you to have forward slashes in file names, and many tools (including the S3 Management Console) will organise files into a folder like interface.</p>

	<h3>Deleting a File From S3</h3>
	<p>Deleting a file from a bucket is easy, just pass in the bucket name and the file name, for example:</p>
<pre><code class="language-php">// Delete file on S3
$s3->deleteObject('BUCKET-NAME', 'it-worked.jpg');</code></pre>

	<h3>Example</h3>
	<p>Assuming we were using my <a href="/writing/restful-routes" title="RESTful Routes Package">RESTful Routes Package</a> we can write some code to allow a user to <strong>POST</strong> a form including a title and image file to the <em>/photo</em> endpoint:</p>
<pre><code class="language-php">// Upload photo
$routes->post('/photo', function () {

	/**
	 To keep this concise I'm using unsanitised variables, DON'T DO THIS!
	 */

	// Generate filename
	$filename = md5(mt_rand()).'.jpg';

	// Perform some file-upload security here
	if ($_FILES['photo']['type'] == 'image/jpeg') {

		// Instantiate S3 library
		$s3 = new S3('ACCESS-KEY-ID', 'SECRET-ACCESS-KEY');

		// Upload an image from the server
		$file_object = $s3->inputFile($_FILES['photo']['tmp_name'], false);
		$file_metadata = array(
			'title' => $_POST['title']
		);
		$upload_status = $s3->putObject($file_object, 'BUCKET-NAME', $filename, S3::ACL_PUBLIC_READ, $file_metadata);

		// Could not be uploaded
		if ( ! $upload_status) {
			header('HTTP/1.1 503 Service Unavailable');
			exit();
		}

		// Return details
		echo json_encode(array(
			'status' => true,
			'filename' => $filename
		));

	}

});</code></pre>
	<p>In the above example I have saved the POSTed title as metadata with the image, this metadata is stored on S3 with the image, and is returned in the header of the image.</p>

	<h3>Reading Files From S3</h3>
	<p>While you can read files from buckets, the maximum the API will return per bucket is 1000. It is best to know the filenames stored in a bucket (eg. using a database table with a record for each file.)</p>

	<h3>Further Reading</h3>
	<p>Amazon CloudFront is Amazons Content Delivery Network, you can easily turn an Amazon S3 bucket into a distribution on CloudFront, this means users will receive the file they request from the closest geographical user. CloudFront also allows you to set a CNAME meaning your "bucket" could be at files.joelvardy.com rather than an ugly Amazon URL.</p>

</div>
