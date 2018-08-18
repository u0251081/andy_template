<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/8/17
 * Time: 上午 11:10
 */
$str = '';
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Demo AJAX</title>
    <script id="hiddenScript" type="text/javascript" src="ExampleAJAX.js" charset="UTF-8"></script>
</head>
<body>
<h1>This is a pure html, exclude php content.</h1>
<form>
    <div id="formTop"></div>
    <div id="formContent">
        <div class="inputGroup">
            <input type="text" name="index" style="width: 180px;" placeholder="input a value for ajax index">
            <input type="text" name="value" style="width: 200px;" placeholder="a value for index specify value">
            <br>
        </div>
    </div>
    <div id="formBottom"></div>
    <button id="add_btn" onclick="addNewRow();" type="button">Add New Row</button>
    <button id="send_btn" onclick="sendForm();" type="button">Send Form</button>
    <br>
    <textarea id="resultArea" style="width: 800px; height: 450px;"><?= $str ?></textarea>
</form>
<script>
    function addNewRow() {
        let newGroup = document.createElement('div');
        newGroup.className = 'inputGroup';
        let newIndex = document.createElement('input');
        newIndex.type = 'text'; newIndex.name = 'index'; newIndex.style = 'width: 180px;';
        newIndex.placeholder = 'input a value for cookie index';
        let newValue = document.createElement('input');
        newValue.type = 'text'; newValue.name = 'value'; newValue.style = 'width: 200px;';
        newValue.placeholder = 'a value for index specify value';
        let newBr = document.createElement('br');
        newGroup.append(newIndex);
        newGroup.append("\n");
        newGroup.append(newValue);
        newGroup.append(newBr);
        // html = "<input type=\"text\" name=\"index\" style=\"width: 180px;\" placeholder=\"input a value for cookie index\">\n";
        // html += "<input type=\"text\" name=\"value\" style=\"width: 200px;\" placeholder=\"a value for index specify value\">\n";
        // html += '<br>';
        document.getElementById('formContent').append(newGroup);
    }

    function sendForm() {
        $.ajax({
            url: 'service.php',
            method: 'post',
            data: getFormValue(),
            success: function(response) {
                refreshResult(response);
                try {
                    let data = JSON.parse(response);
                    refreshResult('\n');
                    refreshResult(objToStr(data));
                    if (typeof data.javascript !== 'undefined') {
                        eval(data.javascript);
                    }
                } catch (e) {
                    refreshResult(response);
                }
            }
        });
    }

    function objToStr(object) {
        let myTab = '    ';
        if (typeof object === 'object') {
            let result = '{\n';
            $.each(object,function(ind,ele) {
                result += myTab + ind;
                if (typeof ele === 'object') {
                    let rcvalue = objToStr(ele).replace(/\n/g,'\n' + myTab);
                    result += ' : ' + rcvalue + '\n';
                }
                else {
                    result += ' : ' + ele + '\n';
                }
            });
            result += '}';
            return result;
        } else {
            return object;
        }
    }

    function getFormValue() {
        let outputData = {};
        $('#formContent').find('input[name="index"]').each(function (ind, ele) {
            let newName = $(this).val();
            let newValue = $(this).closest('.inputGroup').find('input[name="value"]').val();
            console.log(this);
            outputData[newName] = newValue;
        });
        console.log(outputData);
        return outputData;
    }

    function refreshResult(msg) {
        document.getElementById('resultArea').innerHTML += msg + '\n';
    }
</script>
</body>
</html>
