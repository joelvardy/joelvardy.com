<div class="post">

	<h2>JavaScript Image Upload</h2>
	<h4>Posted: <date>4th July 2013</date></h4>

	<p>I put a lot of effort into reducing website load time, the longest a user has to wait is usually when they try to upload a file. In the case of uploading an image, it is highly likely the user is uploading a photo straight from their digital camera.</p>
	<p>In an effort to reduce the users waiting time, and the server load, I'm going to resize images in the browser before uploading them. By doing this you can easily achieve a 90% bandwidth saving.</p>
	<p>I have written a brief demo which allows you to select a number of images, these will then be resized in the browser, and uploaded on the fly. By doing this you can easily achieve a 90% bandwidth saving.</p>
	
	<h3>Why Do this?</h3>
	<p>Take this example:</p>
	<ul>
		<li>User uploads a new avatar from their camera phone - <strong>the image could easily be 5MB in size, taking 15s to upload.</strong></li>
		<li>The server receives an image 3264px by 2448px - <strong>however the image will be displayed at ~600px wide.</strong></li>
	</ul>
	<p>In the above example the user is wasting bandwidth and time uploading a large image, and the server is wasting CPU time processing a large image only to resize it.</p>

	<h3>The Code</h3>
	<p>Below is a brief overview of what happens in the demo:</p>
	<ul>
		<li>Watch for new photo(s) being selected.</li>
		<li>Pass each photo to the <code class="language-javascript">resize.photo</code> method which will resize the photo and return it (as either a file object or a data URL.)</li>
		<li>Upload the resized photo using the <code class="language-javascript">XMLHttpRequest</code> and <code class="language-javascript">FormData</code> APIs.</li>
	</ul>
	<p>In it's simplest form you can use the resize library like this:</p>
	<pre><code class="language-javascript">var resize = new window.resize();
resize.init();

resize.photo(fileOrBlob, 800, 'dataURL', function (thumbnail) {
	image.src = thumbnail;
});</code></pre>

	<h3>The Demo</h3>
	<p>My demo uses vanilla JavaScript and will only work on modern browsers, it is available at <a href="http://demo.joelvardy.com/uploads/" title="JavaScript image upload demo" data-analytics="JavaScript image upload demo">demo.joelvardy.com/uploads</a> - upload some (large) images, and see what you think.</p>

	<h3>The Benefits</h3>
	<p>Because of the resizing there isn't a linear size saving, however I uploaded a few different size images with the <code class="language-javascript">max_size</code> variable set to 1200px - the results are shown below:</p>
	<table>
		<thead>
			<tr>
				<td>Original</td>
				<td>Uploaded</td>
				<td>Saving</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1.39 MB</td>
				<td>91.11 kB</td>
				<td>94%</td>
			</tr>
			<tr>
				<td>542.26 kB</td>
				<td>161.94 kB</td>
				<td>70%</td>
			</tr>
			<tr>
				<td>4.77 MB</td>
				<td>226.89 kB</td>
				<td>95%</td>
			</tr>
		</tbody>
	</table>
	<p>As you can see there are large savings to be made. While the quality is sometimes not optimal, I would upload the image twice the size you need, and downscale it on the server.</p>

	<h3>The Source</h3>
	<p>You can view / use the source code however you like, it is <a href="https://github.com/joelvardy/Javascript-image-upload" title="JavaScript image upload repository" data-analytics="JavaScript image upload repo">available on GitHub</a>.</p>

</div>
