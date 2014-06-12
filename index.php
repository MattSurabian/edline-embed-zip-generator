<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edline iFrame Embed Zip Generator</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
</head>
<body>

<div class="row">
    <div class="text-center columns">
        <h1>Edline Embed Zip Generator</h1>
    </div>
</div>
<div class="row">
    <div class="columns">
        Submitting this form will create a .zip file and download it to your computer. It is a zip compressed <a href="https://gist.github.com/MattSurabian/db95ee2de70fd9ce03a0" target="_blank">index.html file</a> (as required by Edline) which takes the code pasted in the form below and inserts it into the body of the page. While creating and serving the zip archive, a temporary copy is stored on this server with a unique filename. As soon as the file has been sent to your machine, the temporary copy is destroyed. Because Edline is served over HTTPS this tool automatically changes the protocol of any resources linked in the below form from HTTP to HTTPS. This prevents insecure content errors from occurring when the page is loaded in Edline. <a href="https://github.com/MattSurabian/edline-embed-zip-generator" target="_blank">The code powering this tool is available for review here</a>.<br/><br/>
    </div>

    <div class="columns">
        <form method="post" action="zipGenerator.php" data-abide>
            <textarea id="embed_content" name="embed_content" rows=10 placeholder="Paste embed code here" data-abide-validator="body_content_only" required ></textarea>
            <small class="error">This field should NOT be empty and should NOT include &lt;head&gt;, &lt;body&gt;, or &lt;html&gt; tags.</small>
            <br/>
            <button type="submit" href="#" class="medium success button">Download Zip File</a><br/></button>
        </form>

    </div>

</div>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation/foundation.js"></script>
<script src="js/foundation/foundation.abide.js"></script>
<script>
    $(document).foundation({
        abide : {
            validators: {
                body_content_only: function(el, required) {
                    var illegal_tags = [ "head", "body", "html"];
                    var val = $(el).val();

                    if (required && val === ""){
                        return false;
                    }

                    // cross browser Array.every
                    var illegal_tags_in_use = false;
                    var max = illegal_tags.length;
                    for (var i=0; i<max; i++){
                        var tag = illegal_tags[i];
                        var openTag = "<" + tag + ">";
                        var closeTag = "</" + tag + ">";

                        illegal_tags_in_use = (val.indexOf(openTag) >= 0 || val.indexOf(closeTag) >= 0);
                        if (illegal_tags_in_use) {
                            return;
                        }
                    }

                    return !illegal_tags_in_use; // this is a validator, return opposite
                }
            }
        }
    });
</script>
</body>
</html>



