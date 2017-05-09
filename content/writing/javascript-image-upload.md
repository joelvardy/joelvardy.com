+++
date = "2013-07-04T00:00:00+00:00"
draft = false
title = "JavaScript Image Upload"
+++

I put a lot of effort into reducing website load time, the longest a user has to wait is usually when they try to upload a file. In the case of uploading an image, it is highly likely the user is uploading a photo straight from their digital camera.

In an effort to reduce the users waiting time, and the server load, I'm going to resize images in the browser before uploading them. By doing this you can easily achieve a 90% bandwidth saving.

I have written a brief demo which allows you to select a number of images, these will then be resized in the browser, and uploaded on the fly. By doing this you can easily achieve a 90% bandwidth saving.

### Why Do this?
Take this example:

 * User uploads a new avatar from their camera phone - **the image could easily be 5MB in size, taking 15s to upload.**
 * The server receives an image 3264px by 2448px - **however the image will be displayed at ~600px wide.**

In the above example the user is wasting bandwidth and time uploading a large image, and the server is wasting CPU time processing a large image only to resize it.

### The Code
Below is a brief overview of what happens in the demo:
 
 * Watch for new photo(s) being selected.
 * Pass each photo to the <code class="language-javascript">resize.photo</code> method which will resize the photo and return it (as either a file object or a data URL.)
 * Upload the resized photo using the <code class="language-javascript">XMLHttpRequest</code> and <code class="language-javascript">FormData</code> APIs.

In it's simplest form you can use the resize library like this:
```javascript
var resize = new window.resize();
resize.init();

resize.photo(fileOrBlob, 800, 'dataURL', function (thumbnail) {
    image.src = thumbnail;
});
```

### The Demo
My demo uses vanilla JavaScript and will only work on modern browsers, it is available at <a href="https://demo.joelvardy.com/uploads/" title="JavaScript image upload demo" data-analytics="JavaScript image upload demo">demo.joelvardy.com/uploads</a> - upload some (large) images, and see what you think.

### The Benefits
Because of the resizing there isn't a linear size saving, however I uploaded a few different size images with the <code class="language-javascript">max_size</code> variable set to 1200px - the results are shown below:

| Original | Uploaded | Saving |
| --- | --- | --- |
| 1.68 MB | 122.58 kB | 93% |
| 932.14 kB | 58.81 kB | 94% |
| 4.77 MB | 226.89 kB | 95% |

As you can see there are large savings to be made. While the quality is sometimes not optimal, I would upload the image twice the size you need, and downscale it on the server.

### The Source
You can view / use the source code however you like, it is <a href="https://github.com/joelvardy/Javascript-image-upload" title="JavaScript image upload repository" data-analytics="JavaScript image upload repo">available on GitHub</a>.
