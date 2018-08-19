<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/8/19
 * Time: 下午 03:18
 */
?>
<script src="../../assets/js/jquery-3.3.1.js" charset="UTF-8" type="text/javascript"></script>
<script src="../../assets/js/BasicJS.js" charset="UTF-8" type="text/javascript"></script>
<?php
print '<div style="display: flex; width: 800px; flex-wrap: wrap;">';
print '<form action="Service.php" method="POST">';
print '<button>Send</button>';
print '<br>';
print '<div class="form-group">';
print '<label><input type="checkbox" name="action[]" value="read">Read</label>';
print '<label><input type="checkbox" name="action[]" value="write">Write</label>';
print '</div>';
print '</form>';
print '<form action="classService.php" method="post">';
print '<input type="text" name="G" placeholder="myClass or Other">';
print '<input type="text" name="U" placeholder="hello or testing">';
print '<button>testClass</button>';
print '</form>';
print '<textarea id="ResultArea" name="content" style="width: 800px; height: 450px;">';
print '</textarea>';
print '</div>';
?>
<script>
    $(document).on('submit', 'form', function () {
        formajax($(this), refreshResultArea);
        return false;
    });
    $(document).ready(function() {
        $('[value="read"]').click();
        $('form').submit();
    });
</script>
