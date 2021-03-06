<!DOCTYPE html>
<html>
<head>
    <title>Manage Javascript Sourced Data</title>
	<meta charset="utf-8" />
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://code.gijgo.com/1.1.0/js/gijgo.js" type="text/javascript"></script>
    <link href="http://code.gijgo.com/1.1.0/css/gijgo.css" rel="stylesheet" type="text/css" />
    <link href="http://code.gijgo.com/1.1.0/css/demo.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/excellentexport.min.js">

    </script>
</head>
<body>
  <button type="submit" name="action" value="excel" class="btn btn-default"><a download="somedata.xls" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');">匯出EXCEL</a></button>
    <div class="gj-margin-top-10">
        <div class="gj-float-left">
            <form class="display-inline">
                <input id="txtName" type="text" placeholder="Name" class="gj-frm-ctrl gj-display-inline-block" />
                <input id="txtPlaceOfBirth" type="text" placeholder="Place Of Birth" class="gj-frm-ctrl gj-display-inline-block" />
                <button id="btnSearch" type="button" class="gj-button">Search</button>
                <button id="btnClear" type="button" class="gj-button">Clear</button>
            </form>
        </div>
        <div class="gj-float-right">
            <button id="btnAdd" type="button" class="gj-button">Add New Record</button>
        </div>
    </div>
    <div class="gj-clear-both"></div>
    <div class="gj-margin-top-10">
        <table id="grid"></table>
    </div>

    <div id="dialog" class="gj-display-none">
        <input type="hidden" id="ID" />
        <form>
            <div>
                <label for="Name" class="gj-bold">Name:</label>
                <input type="text" class="gj-frm-ctrl gj-width-240" id="Name">
            </div>
            <div class="gj-margin-top-10">
                <label for="PlaceOfBirth" class="gj-bold">Place Of Birth:</label>
                <input type="text" class="gj-frm-ctrl gj-width-240" id="PlaceOfBirth" />
            </div>
            <div class="gj-margin-top-10">
                <button type="button" id="btnSave" class="gj-button">Save</button>
                <button type="button" id="btnCancel" class="gj-button">Cancel</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            var data, grid, dialog;
            data = [
                { 'ID': 1, 'Name': 'Hristo Stoichkov', 'PlaceOfBirth': 'Plovdiv, Bulgaria' },
                { 'ID': 2, 'Name': 'Ronaldo Luís Nazário de Lima', 'PlaceOfBirth': 'Rio de Janeiro, Brazil' },
                { 'ID': 3, 'Name': 'David Platt', 'PlaceOfBirth': 'Chadderton, Lancashire, England' },
                { 'ID': 4, 'Name': 'Manuel Neuer', 'PlaceOfBirth': 'Gelsenkirchen, West Germany' },
                { 'ID': 5, 'Name': 'James Rodríguez', 'PlaceOfBirth': 'Cúcuta, Colombia' },
                { 'ID': 6, 'Name': 'Dimitar Berbatov', 'PlaceOfBirth': 'Blagoevgrad, Bulgaria' }
            ];
            grid = $('#grid').grid({
                dataSource: data,
                columns: [
                    { field: 'ID', width: 32 },
                    { field: 'Name', sortable: true },
                    { field: 'PlaceOfBirth', title: 'Place Of Birth', sortable: true },
                    { width: 50, tmpl: '<a href="#">edit</a>', align: 'center', events: { 'click': Edit } },
                    { width: 50, tmpl: '<a href="#">delete</a>', align: 'center', events: { 'click': Delete } }
                ],
                pager: { limit: 5 }
            });
            dialog = $('#dialog').dialog({
                title: 'Add/Edit Record',
                autoOpen: false,
                resizable: false,
                modal: true
            });
            function Edit(e) {
                $('#ID').val(e.data.id);
                $('#Name').val(e.data.record.Name);
                $('#PlaceOfBirth').val(e.data.record.PlaceOfBirth);
                $('#dialog').dialog('open');
            }
            function Delete(e) {
                if (confirm('Are you sure?')) {
                    grid.removeRow(e.data.id - 1);
                }
            }
            function Save() {
                if ($('#ID').val()) {
                    var id = parseInt($('#ID').val());
                    grid.updateRow(id, { 'ID': id, 'Name': $('#Name').val(), 'PlaceOfBirth': $('#PlaceOfBirth').val() });
                } else {
                    grid.addRow({ 'ID': grid.count(true) + 1, 'Name': $('#Name').val(), 'PlaceOfBirth': $('#PlaceOfBirth').val() });
                }
                dialog.close();
            }
            $('#btnAdd').on('click', function () {
                $('#ID').val('');
                $('#Name').val('');
                $('#PlaceOfBirth').val('');
                $('#dialog').dialog('open');
            });
            $('#btnSave').on('click', Save);
            $('#btnCancel').on('click', function () {
                dialog.close();
            });
            $('#btnSearch').on('click', function () {
                grid.reload({ page: 1, Name: $('#txtName').val(), PlaceOfBirth: $('#txtPlaceOfBirth').val() });
            });
            $('#btnClear').on('click', function () {
                $('#txtName').val('');
                $('#txtPlaceOfBirth').val('');
                grid.reload({ page: 1, Name: $('#txtName').val(), PlaceOfBirth: $('#txtPlaceOfBirth').val() });
            });
        });
    </script>
</body>
</html>
