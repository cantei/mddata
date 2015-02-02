<h3>ระบบ upload file แบบ Ajax</h3>
<div id="mulitplefileuploader">Upload</div>
<div id="status"></div>
<script type="text/javascript">
    $(function() {
        var settings = {
	url: "index.php?r=Product/AjaxUpload",
	method: "POST",
	allowedTypes:"jpg,png,gif,doc,pdf,zip",
	fileName: "myfile",
	multiple: true,
	onSuccess:function(files,data,xhr)
	{
		$("#status").html("<font color='green'>Upload is success</font>");
		
	},
	onError: function(files,status,errMsg)
	{		
		$("#status").html("<font color='red'>Upload is Failed</font>");
	}
}
$("#mulitplefileuploader").uploadFile(settings);
    });
</script>
