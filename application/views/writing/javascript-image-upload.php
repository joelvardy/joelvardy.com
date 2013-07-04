<div class="post">

	<h2>JavaScript Image Upload</h2>
	<h4>Posted: <date>4th July 2013</date></h4>

	<p>Most peoples upload speed is far slower than their download speed. In an effort to reduce the users waiting time, and the server load, I'm going to resize images in the browser before uploading them. By doing this you can easily achieve a 90% bandwidth saving.</p>
	<p>I have written a brief demo which allows you to select a number of images, and upload them on the fly. However the JavaScript also uses the HTML5 canvas API to resize the images in the browser before being uploaded.</p>

	<h3>Why Do this?</h3>
	<p>Take this example:</p>
	<ul>
		<li>User uploads a new avatar from their camera phone - <strong>the image could easily be 5MB in size, taking 15s to upload.</strong></li>
		<li>The server receives an image 3264px by 2448px - <strong>It is only wanting an avatar so resizes it to 300px square.</strong></li>
	</ul>
	<p>In the above example the user is wasting bandwidth and time uploading a large image, and the server is wasting CPU time processing a large image only to resize it.</p>

	<h3>The Demo</h3>
	<p>My demo uses vanilla JavaScript and will only work on modern browsers, it is available at <a href="http://demo.joelvardy.com/uploads/" title="JavaScript image upload demo" data-analytics="JavaScript image upload demo">demo.joelvardy.com/uploads</a> - upload some (large) images, and see what you think.</p>

	<h3>The Benefits</h3>
	<p>Because of the resizing there isn't a linear size saving, however the results of uploading several images are shown below:</p>
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
				<td>3.1MB</td>
				<td>557KB</td>
				<td>82%</td>
			</tr>
			<tr>
				<td>5.6MB</td>
				<td>318KB</td>
				<td>94%</td>
			</tr>
			<tr>
				<td>7.5MB</td>
				<td>241KB</td>
				<td>97%</td>
			</tr>
		</tbody>
	</table>
	<p>As you can see if someone uploads a 7.5MB image from their digital camera, there is a massive saving in upload time.</p>

	<h3>The Source</h3>
	<p>You can view / use the source code however you like, it is <a href="https://github.com/joelvardy/Javascript-image-upload" title="JavaScript image upload repository" data-analytics="JavaScript image upload repo">available on GitHub</a>.</p>

</div>