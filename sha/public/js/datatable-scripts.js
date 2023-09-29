var sb = sb || {};
//Core scripts
sb.core = function () {
    var self = {
        load: function () {
            jQuery(document).ready(self.ready);
        },
        ready: function () {
            self.createtable();
            self.loaddata();
            
        },
        createtable:function(){
            console.log("hi");
            $('#mytablecontatiner').append("<p>hi</p>");
            $('#mytablecontatiner').append('<table id="myadmintable">');
            $('#mytable').append('</table>');
            
        },
        loaddata:function(){
           
            var productDataUrl = 'http://localhost/wordpress/wp-json/sb_clothes/v1/clothes/';
            jQuery.ajax({
                type: "GET",
                url: productDataUrl,
                success: function (response) {
                    var postlist  = JSON.parse(response);
                    var json =[];
                    postlist.forEach(function(data){
                        tabletr = {};
                        tabletr["post_id"] = data.post_id;
                        tabletr["post_categories_name"] = data.post_term_name;
                        tabletr["post_title"] = data.post_title;
                        tabletr["post_content"] = data.post_content;
                        tabletr["post_date"] = data.post_date;
                        tabletr["post_status"] = data.post_status;
                        json.push(tabletr);
                     }); 
                     console.log(json);
                    $('#myadmintable').DataTable({
                        data: json,
                        columns: [
                            { data: 'post_id',title:'Id' },
                            { data:  'post_categories_name',title:'Post_categories_name'},
                            { data: 'post_title',title:'Post_title' },
                            { data:  'post_content',title:'Post_content'},
                            { data:  'post_date',title:'Post_date'},
                            { data:  'post_status',title:'Post_status'},
                            
                        ],
                    });                               
                }
            });
        },
    };
    return self;
}();
sb.core.load();