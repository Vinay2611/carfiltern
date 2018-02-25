
		</div>
	
    <!-- JAVASCRIPT FILES -->
    <script type="text/javascript">var plugin_path = '../assets/plugins/';</script>
    <script type="text/javascript" src="../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../assets/js/app.js"></script>
    <script type="text/javascript" src="adminprocess.js"></script>
        <script type="text/javascript" src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>

    <!-- PAGE LEVEL SCRIPTS -->
    <!-- PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('.sample_5').dataTable( {
                "order": [],
                // Your other options here...
            });
        });
        /*loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
	loadScript(plugin_path + "datatables/js/dataTables.tableTools.min.js", function(){
            loadScript(plugin_path + "datatables/js/dataTables.colReorder.min.js", function(){
                loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){
                    loadScript(plugin_path + "select2/js/select2.full.min.js", function(){

                        var table = jQuery('.sample_5');



                        var oTable = table.dataTable({
                                "order": [
                                        [0, 'DESC']
                                ],
                                "lengthMenu": [
                                        [10, 15, 20, -1],
                                        [10, 15, 20, "All"] // change per page values here
                                ],
                                "pageLength": 10, // set the initial value,
                                "columnDefs": [{  // set default column settings
                                        'orderable': false,
                                        'targets': [0]
                                }, {
                                        "searchable": false,
                                        "targets": [0]
                                }]
                        });

                        var oTableColReorder = new jQuery.fn.dataTable.ColReorder( oTable );
                        var tableWrapper = jQuery('#sample_6_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
                        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

                    });
                });
            });
        });
    });
*/
</script>
</body>
</html>
