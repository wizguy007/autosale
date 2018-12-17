<script type="text/javascript" src="plugins/jquery.js"></script>
<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="plugins/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugins/html2canvas.js"></script>
<script type="text/javascript" src="plugins/jquery.plugin.html2canvas.js"></script>
<script type="text/javascript" src="plugins/printarea.js"></script>

<script type="text/javascript">
  
  function capture() {
    $('.target').html2canvas({
        onrendered: function (canvas) {
            //Set hidden field's value to image data (base-64 string)
            $('#img_val').val(canvas.toDataURL("image/png"));
            //Submit the form manually
            document.getElementById("myForm").submit();
        }
    });
}
</script>

</body>
</html>

<?php 
	mysqli_close($db);
?>