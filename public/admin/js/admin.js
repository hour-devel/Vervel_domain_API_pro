$(document).ready(function(){
    var body = $("body");
    var i=0;
    body.find('.dash-board .fa-bars').click(function(){
        if(i==0){ //full screen
            body.find(".left-menu").css({"transition":"1s"});
            body.find(".left-menu").css({"width":"16.5%"});
            body.find(".dash-board").css({"width":"95.5%"});
            body.find(".dash-board .bar .slide").css({"width":"86.5%"});
            body.find(".left-menu").css({"z-index":"9"});
            body.find(".dash-board").css({"z-index":"10"});
            body.find(".left-menu .bar .txt").css({"display":"none"});
            body.find(".container .devel .txt").css({"display":"none"});
            body.find(".option").css({"width":"21%"});
            body.find(".option ul li a").css({"transition-delay":".5s"});
            body.find(".option ul li a label").css({"display":"none"});
            i=1;
        }else if(i==1){ //left-menu screen
            body.find(".left-menu").css({"transition":"1s"});
            body.find(".left-menu").css({"width":"16.5%"});
            body.find(".dash-board").css({"width":"83.5%"});
            body.find(".dash-board .bar .slide").css({"width":"84.5%"});
            body.find(".left-menu .bar .txt").css({"display":"flex"});
            body.find(".container .devel .txt").css({"display":"flex"});
            body.find(".option").css({"width":"96%"});
            body.find(".option ul li a").css({"transition-delay":"-3s"});
            body.find(".option ul li a label").css({"display":"block"});
            i=0;

        }
    });
    hover_left_menu();
    function hover_left_menu(){
        body.find(".left-menu").hover(
        function(){//full screen
            body.find(".left-menu").css({"transition":"1s"});
            body.find(".left-menu").css({"width":"16.5%"});
            body.find(".dash-board").css({"width":"83.5%"});
            body.find(".dash-board .bar .slide").css({"width":"84.5%"});
            body.find(".left-menu .bar .txt").css({"display":"flex"});
            body.find(".container .devel .txt").css({"display":"flex"});
            body.find(".option").css({"width":"96%"});
            body.find(".option ul li a").css({"transition-delay":"-3s"});
            body.find(".option ul li a label").css({"display":"block"});
        }, //left-menu screen
        function(){
            body.find(".left-menu").css({"transition":"1s"});
            body.find(".left-menu").css({"width":"16.5%"});
            body.find(".dash-board").css({"width":"95.5%"});
            body.find(".dash-board .bar .slide").css({"width":"86.5%"});
            body.find(".left-menu").css({"z-index":"9"});
            body.find(".dash-board").css({"z-index":"10"});
            body.find(".left-menu .bar .txt").css({"display":"none"});
            body.find(".container .devel .txt").css({"display":"none"});
            body.find(".option").css({"width":"21%"});
            body.find(".option ul li a").css({"transition-delay":".5s"});
            body.find(".option ul li a label").css({"display":"none"});
        });
    }

    //add todo list
    todo_list();
    async function todo_list(){
        var url = "http://localhost:8000/API/ToDo-List";
        var rp = await fetch(url);
        var rs = await rp.json();
        var list='';
        rs.todo_lists.forEach( (e) =>{
            if(e.status=='check'){
                list += `
                    <li>
                        <div class="list" data-id="${e.id}">
                            <span>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </span>
                            <i class="fa-regular check fa-square-check" id="check-box" style="color:blue"></i>
                            <p style="text-decoration:line-through;opacity:0.3"> 
                                <input type="text" id="todo" name="name" class="form-control"" value=" ${e.name}" readonly>
                            </p>
                        </div>
                    </li>
                `;
            }else if(e.status=='none'){
                list += `
                    <li>
                        <div class="list" data-id="${e.id}">
                            <span>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </span>
                            <i class="fa-regular check fa-square" id="check-box"></i>
                            <p> 
                                <input type="text" id="todo" name="name" class="form-control"" value=" ${e.name}"  readonly>
                            </p>
                        </div>
                        <i class="fa-regular fa-pen-to-square" id="edit-todo-list"></i>
                    </li>
                `;
            }
            body.find(".contain .todo-list .card-body ul").html(list);
        });
        body.find(".contain .todo-list .card-body ul li .list").click(function(){
            var eThis = $(this);
            var id=eThis.data("id");
            var status='';
            if(eThis.find(".fa-square-check").length > 0){
                eThis.find("i#check-box").addClass("fa-square");
                eThis.find("i#check-box").removeClass("fa-square-check");
                eThis.find("i#check-box").css({"color":"black"});
                eThis.find("p").css({"text-decoration":"none"})
                eThis.find("p").css({"opacity":"1"})
                status="none";
            }else if(eThis.find(".fa-square-check").length == 0){
                eThis.find("i#check-box").addClass("fa-square-check");
                eThis.find("i#check-box").removeClass("fa-square");
                eThis.find("i#check-box").css({"color":"blue"});
                eThis.find("p").css({"text-decoration":"line-through"})
                eThis.find("p").css({"opacity":"0.3"})
                status="check";
            }
            $.ajax({
                url:`/API/ToDo-List/Status_update/${id}/${status}`,
                type:'PUT',
                success:function(data){   
                        //work after success        
                }				
            }); 
        });
        body.find(".contain .todo-list .card-body ul li i#edit-todo-list").click(function(){
            var eThis = $(this);
            var parents = eThis.parents('li');
            var id = parents.find('.list').data('id');
            var name = parents.find(".list p input");
            name.focus();
            // $.ajax({
            //     url:`API/ToDo-List/${id} `,
            //     type:'PUT',
            //     success:function(data){   
            //             //work after success        
            //     }				
            // }); 
        });
    }
    body.find(".contain .todo-list .bottom button").click(function(){
        var txt='';
        txt += `
                <li>
                    <span>
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </span>
                    <i class="fa-regular check fa-square" id="check-box"></i>
                    <p> <input type="text" id="todo" name="name" class="form-control""></p>
                </li>
        `;
        body.find(".contain .todo-list .card-body ul").prepend(txt);
    });
    // auto product after dis 
    var price = body.find(".tab form .row .column input#price");
    var after_dis = body.find(".tab form .row .column input#after_dis");
    price.keyup(function(){
        after_dis.val(price.val());
    })
    body.find(".tab form .row .column select#discount").change(function(){
        var eThis = $(this);
        var dis= eThis.val();
        price.keyup(function(){

        })
        if(dis == 0){
            after_dis.val(price.val());
            return;
        }
        after_dis.val( ((price.val() * (100-dis)) / 100).toFixed(2) );
    });
    // show product multi image
    body.find(".list table tr td img.pro").click(function(){
        var eThis = $(this);
        var parent = eThis.parent();
        parent.find('.popUp-img').css({"display":"flex"});
        parent.find('.popUp-img i').click(function(){
            parent.find('.popUp-img').css({"display":"none"});
        });
    });
    // filter input product
    body.find(".tab  form .filter-input  select#filter_input").change(function(){
        var val = $(this).val();
        if(val==1){
            body.find(".tab form .row").hide();
            body.find(".tab form .rowpro").hide();
            body.find(".tab form .textarea").show();
        }else if(val==0){
            body.find(".tab form .row").show();
            body.find(".tab form .rowpro").show();
            body.find(".tab form .textarea").hide();
        }
    });
    //auto amount on import product
    body.find('.tab  form .column .box select#product').change(function(){
        var price;
        var eThis = $(this);
        var id = eThis.val();
        var qty = body.find('.tab  form .column .box input#qty');
        var amount = body.find('.tab  form .column .box input#amount');
        $.ajax({
            url:`/API/Import_Amount/add_amount/${id}`,
            type:'GET',
            beforeSend:function(){
                //work before success    
            },
            success:function(data){   
                data.product.forEach( (e) =>{
                    price = e['price']
                });
                amount.val(parseFloat(qty.val()*price));
                qty.keyup(function(){
                    amount.val(parseFloat(qty.val()*price));
                });
            }	
        }); 
    });

    

    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        navLinks: true,
        editable: true,
        events: "getevent",           
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
    selectable: true,
    selectHelper: true,
    select: function (start, end, allDay) {
        var title = prompt('Event Title:');
        if (title) {
            var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD'); 
            var end = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD'); 
            $.ajax({ 
                url: "{{ URL::to('createevent') }}",
                data: 'title=' + title + '&start=' + start + '&end=' + end +'&_token=' +"{{ csrf_token() }}",
                type: "post",
                success: function (data) {
                    alert("Added Successfully");
                    $('#calendar').fullCalendar('refetchEvents');
                }
            });
        }
    },
    eventClick: function (event) {
        var deleteMsg = confirm("Do you really want to delete?");
        if (deleteMsg) { 
           $.ajax({
                type: "POST",
                url: "{{ URL::to('deleteevent') }}",
                data: "&id=" + event.id+'&_token=' +"{{ csrf_token() }}",
                success: function (response) {
                    if(parseInt(response) > 0) {
                        $('#calendar').fullCalendar('removeEvents', event.id);
                        alert("Deleted Successfully");
                    }
                }
            });
        }
    }
    });
    let searchParams = new URLSearchParams(window.location.search);
    let param = searchParams.get('screen');

    if(param=='full'){
        body.find("i.min").show();
        body.find("i.max").hide();
        var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
            (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
            (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
            (document.msFullscreenElement && document.msFullscreenElement !== null);
    
        var docElm = document.documentElement;
        if (!isInFullScreen){
            if (docElm.requestFullscreen) {
                docElm.requestFullscreen();
            } else if (docElm.mozRequestFullScreen) {
                docElm.mozRequestFullScreen();
            } else if (docElm.webkitRequestFullScreen) {
                docElm.webkitRequestFullScreen();
            } else if (docElm.msRequestFullscreen) {
                docElm.msRequestFullscreen();
            }
            body.find(".left-menu").css({"height":"864px"});
            body.find(".dash-board").css({"height":"809px"});
        }
    }else if(param=='exit'){
        body.find("i.min").hide();
        body.find("i.max").show();
        var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
        (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
        (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
        (document.msFullscreenElement && document.msFullscreenElement !== null);

        var docElm = document.documentElement;
        if (isInFullScreen){
            if (docElm.exitFullscreen) {
                docElm.exitFullscreen();
            } else if (docElm.webkitExitFullscreen) {
                docElm.webkitExitFullscreen();
            } else if (docElm.mozCancelFullScreen) {
                docElm.mozCancelFullScreen();
            } else if (docElm.msExitFullscreen) {
                docElm.msExitFullscreen();
            }
            body.find(".left-menu").css({"height":"755px"});
        }
        alert("exite Full Screen !!");
    }
});