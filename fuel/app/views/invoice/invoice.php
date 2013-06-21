<style>
    .main {padding-top: 1px}
    .invoice_content_table {min-height: 280px}
    .invoice_content td,th{width: 200px;border-bottom: 1px solid black;text-align: center}
    .qty{width: 40px}
</style>
<?php
$i=0;
$disorder[$i]="";
foreach ($panels as $panel):
$disorder[$i]=$panel->name;
$i++;
endforeach;
print_r($disorder);
?>
<?php echo Form::open(array("class" => "", "action" => "/invoice/submit_content")); ?>
Invoice Content:
    <div class="span3 pull-right">
    <input class="btn btn-danger"type="button" value="Add Row" onclick="addRow('invoice_content')" />
        <input class="btn btn-danger" type="button" value="Delete Row" onclick="deleteRow('invoice_content')" />
</div>
<div class="invoice_content_table">
    <table id="invoice_content" class="invoice_content">
        <th>Delete</th>
        <th>Qty.</th>
        <th>Panel</th>
        <th>Unit Price</th>
        <th>Extended Price</th>
     <!--   <tr id="add_row">
            <td id="serial" style="text-align:center">1.</td>
            <td id=""><input type="number" name="quantity" style="width:50px"  ></td>
            <td id = "panels" > 
                <select >
        
                </select>
            </td>
            <td id = "unit_price"></td>
            <td id = "price" style="text-align: right"></td>
            <td>Add Row</td>
        </tr>
        -->
                <TR>
                        <td><INPUT type="checkbox" name="chk"/></td>
                        <td > <INPUT class="qty" type="number" placeholder="Qty." style="width:40px" /> </td>
            <TD> <INPUT type="text"  placeholder="panel" style="width:150px" /> </TD>
            <TD> <INPUT type="text"   placeholder="unit price" style="width:100px" /> </TD>
            <TD> <INPUT type="text"  placeholder="price" style="width:100px" /> </TD>
                    </TR>

    </table>
     

</div>
<div class="row" style="border-bottom:1px solid black"></div>
<div class="row" style="padding-top:5px">
    <div class="span5 pull-left">
        Total Rs.<input type="text" /> 
        <br />Current Due ( Rs.) :
        <br />Outstanding (Rs. ):
        <br />Due Date:

    </div>
    <div class="span4 ">
        <label>Comment Box:</label>
        <textarea style="height: 70px;width: 300px" >All amounts are due within 30 days of receipt of invoice.Interest on outstanding balances will be charged at a monthly rate of 1.5% </textarea> 
    </div>
    <div class="span1" style="margin-top:40px;margin-left: 40px">
        <input class="btn btn-large btn-danger" type="submit" value="Next" />
    </div>
</div>
<fieldset>

</fieldset>
<?php echo Form::close(); ?>
<script language="javascript">
               function addRow(tableID) {
 
                        var table = document.getElementById(tableID);
 
                        var rowCount = table.rows.length;
                        var row = table.insertRow(rowCount);
    
            var choices = [];
            choices[0] = "one";
            choices[1] = "two";

            function addInput(divName) {
                var newDiv = document.createElement('div');
                var selectHTML = "";
                selectHTML = "<select>";
                for (i = 0; i < choices.length; i = i + 1) {
                    selectHTML += "<option value='" + choices[i] + "'>" + choices[i] + "</option>";
                }
                selectHTML += "</select>";
                newDiv.innerHTML = selectHTML;
                document.getElementById(divName).appendChild(newDiv);
            } 

                        var cell1 = row.insertCell(0);
                        var element1 = document.createElement("input");
                        element1.type = "checkbox";
                        element1.name = "chkbox[]";
                        cell1.appendChild(element1);
 
//                        var cell2 = row.insertCell(1);
            //                      cell2.innerHTML = rowCount;
 
                        var cell2 = row.insertCell(1);
            var element1 = document.createElement("input");
                        element1.type = "number";
                        element1.name = "quantity";
                        element1.style.width = "40px";
            element1.placeholder = "Qty.";
                        cell2.appendChild(element1);
 
                var cell3 = row.insertCell(2);
            var newDiv = document.createElement('div');
            var selectHTML = "";
            selectHTML = "<select>";
            for (i = 0; i < choices.length; i = i + 1) {
                selectHTML += "<option value='" + choices[i] + "'>" + choices[i] + "</option>";
            }
            selectHTML += "</select>";
            newDiv.innerHTML = selectHTML;


                        cell3.appendChild(newDiv);
 
                var cell4 = row.insertCell(3);
            var element3 = document.createElement("input");
                        element3.type = "text";
                        element3.name = "unit_price";
            element3.placeholder = "unit price";
            element3.setAttribute("style", "width: 100px;");
                        cell4.appendChild(element3);
 
                var cell5 = row.insertCell(4);
            var element4 = document.createElement("input");
                        element4.type = "text";
                        element4.name = "price";
            element4.placeholder = "price";
            element4.setAttribute("style", "width: 100px;");
                        cell5.appendChild(element4);
 
 
                }
 
                function deleteRow(tableID) {
                        try {
                            var table = document.getElementById(tableID);
                            var rowCount = table.rows.length;
 
                            for (var i = 0; i < rowCount; i++) {
                                    var row = table.rows[i];
                                    var chkbox = row.cells[0].childNodes[0];
                                    if (null != chkbox && true == chkbox.checked) {
                                            table.deleteRow(i);
                                            rowCount--;
                                            i--;
                                    }
 
 
                            }
                        } catch (e) {
                                alert(e);
                        }
                }
 
</script>