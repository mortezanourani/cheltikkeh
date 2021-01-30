
/* ---------------------------------------------------------------------------------------------------- */
var controls = '<button id="btndelete" onclick="module_delete( $(this) )"></button><button id="btnmove" draggable="true" ondragstart="module_drag( $(this) )"></button>';
var first_module = '<center><div class="module-place" id="new-module" ondrop="add( event )" ondragover="firstdrop( event )">با کشیدن و قرار دادن یکی از المان ها در این محل طراحی این صفحه را آغاز کنید.</div></center>';
var dis;
var change_width = false;

function removeDrag(){
	$("#locator").removeAttr("ondragover");
	$("#locator").removeAttr("ondrop");
}

function addFirst( module_data ){
	$("#new-module").before('<div class="row" id="row1"><div class="col" id="col1" style="width: 100%;"><div class="mp" id="mp1" ondrop="add( event )" ondragover="allowdrop( event, $(this) )">' + controls + module_data + '</div></div>');
	//$("#row1").css({"height": $("#row1 #mp1").css("height")});
}
	
function addRow( module_data ){
	if( $("#locator").prev().attr("id") != undefined ){
		id = parseInt( $("#locator").prev().attr("id").substr(3) ) + 1;
	}else{
		id = parseInt( $("#locator").next().attr("id").substr(3) );
	}
	nums = id;
	while( $("#row" + nums ).attr("id") ){
		nums++;
	}
	for( c = nums; c >= id; c-- ){
		$("#row" + c).attr({"id": "row" + (c+1)});
	}
	$("#locator").attr({"id": "row" + id});
	$("#row" + id).removeClass();
	$("#row" + id).addClass("row");
	$("#row" + id).html('<div class="col" id="col1" style="width: 100%;"><div class="mp" id="mp1" ondrop="add( event )" ondragover="allowdrop( event, $(this) )">' + controls + module_data + '</div></div>');
	//$("#row" + id).css({"height": $("#row" + id + " #mp1").css("height")});
}
	
function addCol( module_data ){
	var row = $("#locator").parent().attr("id");
	if( $("#locator").prev().attr("id") != undefined ){
		id = parseInt( $("#locator").prev().attr("id").substr(3) ) + 1;
	}else{
		id = parseInt( $("#locator").next().attr("id").substr(3) );
	}
	nums = id;
	while( $("#" + row + " #col" + nums ).attr("id") ){
		nums++;
	}
	for( c = nums; c >= id; c-- ){
		$("#" + row + " #col" + c ).attr({"id": "col" + (c+1)});
	}
	$("#locator").attr({"id": "col" + id});
	$("#" + row + " #col" + id).css({"left": "", "height": ""});
	$("#" + row + " #col" + id).removeClass();
	$("#" + row + " #col" + id).addClass("col");
	$("#" + row + " #col" + id).html('<div class="mp" id="mp1" ondrop="add( event )" ondragover="allowdrop( event, $(this) )">' + controls + module_data + '</div>');
	$("#" + row + " .col").css({"width": 100 / nums + "%"});
	for( c = 1; c <= nums; c++ ){
		$("#" + row + " #col" + c).css({"margin-right": (nums - c) * (100 / nums) + "%"});
		if( $("#" + row + " #col" + (c-1) ).css("height") )
			$("#" + row + " #col" + c).css({"margin-top": "-" + $("#" + row + " #col" + (c-1) ).css("height") });
	}
}

function addMP( module_data ){
	var row = $("#locator").parent().parent().attr("id");
	var col = $("#locator").parent().attr("id");
	if( $("#locator").prev().attr("id") != undefined ){
		id = parseInt( $("#locator").prev().attr("id").substr(2) ) + 1;
	}else{
		id = parseInt( $("#locator").next().attr("id").substr(2) );
	}
	nums = id;
	while( $("#" + row + " #" + col + " #mp" + nums ).attr("id") ){
		nums++;
	}
	for( c = nums; c >= id; c-- ){
		$("#" + row + " #" + col + " #mp" + c ).attr({"id": "mp" + (c+1)});
	}
	$("#locator").before( '<div class="mp" id="mp' + id + '" ondrop="add( event )" ondragover="allowdrop( event, $(this) )">' + controls + module_data + '</div></div>' );
	$("#locator").remove();
}

function module_drag( element ){
	module = element.parent().html().replace('<button id="btndelete" onclick="module_delete( $(this) )"></button><button id="btnmove" draggable="true" ondragstart="module_drag( $(this) )"></button>', '');
	event.dataTransfer.setData("module", module);
	event.dataTransfer.setData("row", element.parent().parent().parent().attr("id"));
	event.dataTransfer.setData("col", element.parent().parent().attr("id"));
	event.dataTransfer.setData("mp", element.parent().attr("id"));
}

function module_delete( element ){
	var mp = element.parent().attr("id");
	var col = element.parent().parent().attr("id");
	var row = element.parent().parent().parent().attr("id");
	var mp_nums = 1;
	var col_nums = 1;
	var row_nums = 1;
	while( $("#" + row + " #" + col + " #mp" + mp_nums).attr("id") ){
		mp_nums++
	}
	mp_nums--;
	while( $("#" + row + " #col" + col_nums).attr("id") ){
		col_nums++
	}
	col_nums--;
	while( $("#row" + row_nums).attr("id") ){
		row_nums++
	}
	row_nums--;
	if( mp_nums === 1){
		switch( col_nums ){
			case( 1 ):		// Work Truly
				$("#" + row ).remove();
				row_id = parseInt( row.substr(3) ) + 1;
				while( $("#row" + row_id).attr("id") ){
					$("#row" + row_id).attr({"id": "row" + (row_id - 1)});
					row_id++;
				}
				if( ! $("#row1").attr("id") ){
					$("#content").html( first_module );
				}
				break;
				
			case( 2 ):		// Work Truly
				$("#" + row + " #" + col).remove();
				$("#" + row + " .col").attr({"id": "col1"});
				$("#" + row + " #col1").css({"width": "100%", "margin-right": "", "margin-top": "", "left": ""});
				break;
				
			default:
				$("#" + row + " #" + col ).remove();			// Delete selected coulmns
				col_id = parseInt( col.substr(3) ) + 1;
				while( $("#" + row + " #col" + col_id).attr("id") ){			// Rename other coulmns
					$("#" + row + " #col" + col_id).attr({"id": "col" + (col_id - 1)});
					col_id++;
				}
				col_nums--;					// Calculate new numbers of columns
				$("#" + row + " .col").css({"width": (100 / col_nums) + "%" });
				
				for( c = 1; c <= col_nums; c++ ){
					$("#" + row + " #col" + c).css({"margin-right": (col_nums - c) * (100 / col_nums) + "%" });
					$("#" + row + " #col" + c).css({"margin-top": "0px" });
					if( $("#" + row + " #col" + (c - 1) ).css("height") )
						$("#" + row + " #col" + c).css({"margin-top": "-" + $("#" + row + " #col" + (c - 1) ).css("height") });
				}
		}
	}else{
		$("#" + row + " #" + col + " #" + mp ).remove();
		mp_id = parseInt( mp.substr(2) ) + 1;
		while( $("#" + row + " #" + col + " #mp" + mp_id).attr("id") ){
			$("#" + row + " #" + col + " #mp" + mp_id).attr({"id": "mp" + (mp_id - 1)});
			mp_id++;
		}
		max_height = 0;
		for( c = 1; c <= col_nums; c++ ){
			n = 1;
			col_height = 0;
			while( $("#" + row + " #col" + c + " #mp" + n).attr("id") ){
				col_height += parseInt( $("#" + row + " #col" + c + " #mp" + n).css("height") );
				n++;
			}
			if( col_height > max_height )
				max_height = col_height;
		}
		$("#" + row).css({"height": max_height + "px"});
	}
};

/* ---------------------------------------------------------------------------------------------------- */

function drag( event, id ){
	event.dataTransfer.setData("id", id);
}

function firstdrop( event ){
	event.preventDefault();
	$("#modules-menu").css({"display" : "none"});
}

function allowdrop( event, element ){
	event.preventDefault();
	var width = element.width();
	var height = element.height();
	var offset = element.offset();
	var mouseX = ( event.pageX - offset.left - width / 2 );
	var mouseY = ( height / 2 - ( event.pageY - offset.top ) );
	var locator_brief = 'id="locator" ondrop="add( event )" ondragover="event.preventDefault()"';
	
	element.parent().parent().parent().find( ".horizental-locator" ).remove();
	element.parent().parent().parent().find( ".vertical-locator" ).remove();
	/*
	if( ( height / 2 ) - Math.abs( mouseY ) < 25 ){
	*/
		if( mouseY > 0 ){
			if( element.prev().attr("class") === "row" || element.prev().attr("class") === undefined ){
				element.parent().parent().before( '<div class="horizental-locator" ' + locator_brief + '></div>' );
			}else{
				element.before( '<div class="horizental-locator" ' + locator_brief + '></div>' );
			}
		}else{
			if( element.next().attr("class") === "row" || element.next().attr("class") === undefined  ){
				element.parent().parent().after( '<div class="horizental-locator" ' + locator_brief + '></div>' );
			}else{
				element.after( '<div class="horizental-locator" ' + locator_brief + '></div>' );
			}
		}
	/*
	}else{
		if( ( width / 2 ) - Math.abs( mouseX ) > 50 ){
			if( element.parent().parent().find("#col2").css("display") ){
				if( mouseY > 0 ){					// Top MP Detection
					element.before( '<div class="horizental-locator" ' + locator_brief + '></div>' );
				}else{								// Bottom MP Detection
					element.after( '<div class="horizental-locator" ' + locator_brief + '></div>' );
				}
			}else{
				if( mouseY > 0 ){					// Top Detection
					element.parent().parent().before( '<div class="horizental-locator" ' + locator_brief + '></div>' );
				}else{								// Bottom Detection
					element.parent().parent().after( '<div class="horizental-locator" ' + locator_brief + '></div>' );
				}
			}
		}else{
			var height = parseInt( element.parent().parent().css("height") );
			if( mouseX > 0 ){					// Right Detection
				var left = parseInt(offset.left) + parseInt(width) - 11;
				element.parent().after( '<div class="vertical-locator" ' + locator_brief + ' style="height: ' + height + 'px; left: ' + left + 'px;"></div>' );
			}else{								// Left Detection
				var left = parseInt(offset.left);
				element.parent().before( '<div class="vertical-locator" ' + locator_brief + ' style="height: ' + height + 'px; left: ' + offset.left + 'px;"></div>' );
			}
		}
	}
	*/
	$("#modules-menu").css({"display" : "none"});
}

function add( event ){
	event.preventDefault();
	var id = event.dataTransfer.getData("id");

	var module = event.dataTransfer.getData("module");
	var row = event.dataTransfer.getData("row");
	var col = event.dataTransfer.getData("col");
	var mp = event.dataTransfer.getData("mp");

	var prev = $("#locator").prev().attr("class");
	var next = $("#locator").next().attr("class");
	
	removeDrag();
	$.post( "/designer/functions.php", { operation: "read_module", module_id: id } )
	.done(function( result ){
		if( id === "" )
			result = module;
		switch( prev ){
			case( "row" ):
				if( parseInt( $("#locator").prev().attr("id").substr(3) ) < parseInt( row.substr(3) ) )
					row = "row" + ( parseInt( row.substr(3) ) + 1 );
				addRow( result );
				break;
			case( "col" ):
				if( $("#locator").parent().attr("id") === row && parseInt( $("#locator").prev().attr("id").substr(3) ) < parseInt( col.substr(3) ) )
					col = "col" + ( parseInt( col.substr(3) ) + 1 );
				addCol( result );
				break;
			case( "mp" ):
				if( $("#locator").parent().parent().attr("id") === row && $("#locator").parent().attr("id") === col && parseInt( $("#locator").prev().attr("id").substr(2) ) < parseInt( mp.substr(2) ) )
					mp = "mp" + ( parseInt( mp.substr(2) ) + 1 );
				addMP( result );
				break;
			default:
				switch( next ){
					case( "row" ):
						if( parseInt( $("#locator").next().attr("id").substr(3) ) < parseInt( row.substr(3) ) )
							row = "row" + ( parseInt( row.substr(3) ) + 1 );
						addRow( result );
						break;
					case( "col" ):
						if( $("#locator").parent().attr("id") === row && parseInt( $("#locator").next().attr("id").substr(3) ) < parseInt( col.substr(3) ) )
							col = "col" + ( parseInt( col.substr(3) ) + 1 );
						addCol( result );
						break;
					case( "mp" ):
						if( $("#locator").parent().parent().attr("id") === row && $("#locator").parent().attr("id") === col && parseInt( $("#locator").next().attr("id").substr(2) ) < parseInt( mp.substr(2) ) )
							mp = "mp" + ( parseInt( mp.substr(2) ) + 1 );
						addMP( result );
						break;
					default:
						addFirst( result );
						$("#new-module").remove();
				}
		}
		if( id === "" )
			module_delete( $("#" + row + " #" + col + " #" + mp + " #btndelete") );
	});
}

/* ---------------------------------------------------------------------------------------------------- */

function create_settings_form( element, settings ){
	$("#settings-form .control").css({"display": "none"});
	for( c = 0; c < settings.length; c++ ){
		switch( settings[c] ){
			case("text"):
				var text = element.text();
				$("#settings-form #txttext").val( text );
				$("#settings-form #text").css({"display": "initial"});
				break;
			case("widthpx"):
				var width = parseFloat( element.css("width") );
				$("#settings-form #txtwidth").val( width + "px" );
				$("#settings-form #width").css({"display": "initial"});
				break;
			case("widthpc"):
				var width = parseFloat( element.css("width") );
				var parent_width = parseFloat( element.parent().css("width") );
				$("#settings-form #txtwidth").val( parseInt( ( width / parent_width ) * 100 ) + "%" );
				$("#settings-form #width").css({"display": "initial"});
				break;
			case("heightpx"):
				var height = parseFloat( element.css("height") );
				$("#settings-form #txtheight").val( height + "px" );
				$("#settings-form #height").css({"display": "initial"});
				break;
			case("heightpc"):
				var height = parseFloat( element.css("height") );
				var parent_height = parseFloat( element.parent().css("height") );
				$("#settings-form #txtheight").val( parseInt( ( height / parent_height ) * 100 ) + "%" );
				$("#settings-form #height").css({"display": "initial"});
				break;
			case("toppx"):
				var top = parseFloat( element.css("top") );
				$("#settings-form #txttop").val(top + "px" );
				$("#settings-form #top").css({"display": "initial"});
				break;
			case("toppc"):
				var top = parseFloat( element.css("top") );
				var height = parseFloat( element.parent().css("height") );
				$("#settings-form #txttop").val( parseInt( ( top / height ) * 100 ) + "%" );
				$("#settings-form #top").css({"display": "initial"});
				break;
			case("rightpx"):
				var right = parseFloat( element.css("right") );
				$("#settings-form #txtright").val(right + "px" );
				$("#settings-form #right").css({"display": "initial"});
				break;
			case("rightpc"):
				var right = parseFloat( element.css("right") );
				var height = parseFloat( element.parent().css("height") );
				$("#settings-form #txtright").val( parseInt( ( right / height ) * 100 ) + "%" );
				$("#settings-form #right").css({"display": "initial"});
				break;
			case("bottompx"):
				var bottom = parseFloat( element.css("bottom") );
				$("#settings-form #txtbottom").val(bottom + "px" );
				$("#settings-form #bottom").css({"display": "initial"});
				break;
			case("bottompc"):
				var bottom = parseFloat( element.css("bottom") );
				var height = parseFloat( element.parent().css("height") );
				$("#settings-form #txtbottom").val( parseInt( ( bottom / height ) * 100 ) + "%" );
				$("#settings-form #bottom").css({"display": "initial"});
				break;
			case("leftpx"):
				var left = parseFloat( element.css("left") );
				$("#settings-form #txtleft").val(left + "px" );
				$("#settings-form #left").css({"display": "initial"});
				break;
			case("leftpc"):
				var left = parseFloat( element.css("left") );
				var height = parseFloat( element.parent().css("height") );
				$("#settings-form #txtleft").val( parseInt( ( left / height ) * 100 ) + "%" );
				$("#settings-form #left").css({"display": "initial"});
				break;
			case("vposition"):
				var bottom = parseFloat( element.css("bottom") );
				var height = parseFloat( element.parent().css("height") );
				if( bottom >  height / 2 ){
					$("#settings-form #vposition #top").attr({"checked": true});
				}else{
					if( bottom <  height / 2 ){
						$("#settings-form #vposition #bottom").attr({"checked": true});
					}else{
						$("#settings-form #vposition #middle").attr({"checked": true});
					}
				}
				$("#settings-form #vposition").css({"display": "initial"});
				break;
			case("hposition"):
				var right = parseFloat( element.css("right") );
				var width = parseFloat( element.parent().css("width") );
				if( right > width / 2 ){
					$("#settings-form #hposition #left").attr({"checked": true});
				}else{
					if( right < width / 2 ){
						$("#settings-form #hposition #right").attr({"checked": true});
					}else{
						$("#settings-form #hposition #center").attr({"checked": true});
					}
				}
				$("#settings-form #hposition").css({"display": "initial"});
				break;
			case("backcolor"):
				var color = element.css('backgroundColor');
				$("#settings-form #color #preview").css({"background-color": color});
				color = color.substr( color.indexOf("(") );
				red = parseInt( color.substr( 1, color.indexOf(",") ) );
				color = color.substr( color.indexOf(",") + 1 );
				green = parseInt( color.substr( 1, color.indexOf(",") ) );
				color = color.substr( color.indexOf(",") + 1 );
				if( color.indexOf(",") > 0 ){
					blue = parseInt( color.substr( 1, color.indexOf(",") ) );
				}else{
					blue = parseInt( color.substr( 1, color.indexOf(")") ) );
				}
				$("#settings-form #color #red").next().css({"left": red});
				$("#settings-form #color #green").next().css({"left": green});
				$("#settings-form #color #blue").next().css({"left": blue});
				$("#settings-form #color").css({"display": "initial"});
				break;
			case("backimage"):
				var src = element.css("background-image");
				var puresrc = src.replace('url("', '').replace('")', '');
				$("#settings-form #src #browse").attr({"value": puresrc});
				$("#settings-form #src #preview").css({"background-image": src});
				$("#settings-form #src").css({"display": "initial"});
				break;
			case("bordercolor"):
				var color = element.css('borderColor');
				$("#settings-form #bordercolor #preview").css({"background-color": color});
				color = color.substr( color.indexOf("(") );
				red = parseInt( color.substr( 1, color.indexOf(",") ) );
				color = color.substr( color.indexOf(",") + 1 );
				green = parseInt( color.substr( 1, color.indexOf(",") ) );
				color = color.substr( color.indexOf(",") + 1 );
				if( color.indexOf(",") > 0 ){
					blue = parseInt( color.substr( 1, color.indexOf(",") ) );
				}else{
					blue = parseInt( color.substr( 1, color.indexOf(")") ) );
				}
				$("#settings-form #bordercolor #red").next().css({"left": red});
				$("#settings-form #bordercolor #green").next().css({"left": green});
				$("#settings-form #bordercolor #blue").next().css({"left": blue});
				$("#settings-form #bordercolor").css({"display": "initial"});
				break;
			case("src"):
				var src = element.attr("src");
				$("#settings-form #src #browse").attr({"value": src});
				$("#settings-form #src #preview").css({"background-image": "url('" + src + "')"});
				$("#settings-form #src").css({"display": "initial"});
				break;
			case("text-align"):
				var textalign = element.css("text-align");
				$("#settings-form #text-align #optt" + textalign).attr({"checked": true});
				$("#settings-form #text-align").css({"display": "initial"});
				break;
			case("font"):
				var family = element.css("font-family");
				var size = parseInt( element.css("font-size") );
				var weight = element.css("font-weight").toString().toLowerCase();
				var style = element.css("font-style").toString().toLowerCase();
				var color = element.css('color');
				$("#settings-form #font #family").val( family );
				$("#settings-form #font #font-preview").css({"font-family": family});
				$("#settings-form #font #size").val( size );
				if( size < 30 ){
					$("#settings-form #font #font-preview").css({"font-size": size });
				}else{
					$("#settings-form #font #font-preview").css({"font-size": "30px" });
				}
				$("#settings-form #font #weight").attr({"checked": false});
				$("#settings-form #font #font-preview").css({"font-weight": "normal"});
				if( weight === "bold" ){
					$("#settings-form #font #weight").attr({"checked": true});
					$("#settings-form #font #font-preview").css({"font-weight": "bold"});
				}
				$("#settings-form #font #style").attr({"checked": false});
				$("#settings-form #font #font-preview").css({"font-style": "normal"});
				if( style === "italic" ){
					$("#settings-form #font #style").attr({"checked": true});
					$("#settings-form #font #font-preview").css({"font-style": "italic"});
				}
				$("#settings-form #font #font-preview").css({"color": color});
				color = color.substr( color.indexOf("(") );
				red = parseInt( color.substr( 1, color.indexOf(",") ) );
				color = color.substr( color.indexOf(",") + 1 );
				green = parseInt( color.substr( 1, color.indexOf(",") ) );
				color = color.substr( color.indexOf(",") + 1 );
				if( color.indexOf(",") > 0 ){
					blue = parseInt( color.substr( 1, color.indexOf(",") ) );
				}else{
					blue = parseInt( color.substr( 1, color.indexOf(")") ) );
				}
				$("#settings-form #font #red").next().css({"left": red});
				$("#settings-form #font #green").next().css({"left": green});
				$("#settings-form #font #blue").next().css({"left": blue});
				
				$("#settings-form #font").css({"display": "initial"});
				break;

			case("parent-href"):
				var href = element.parent().attr("href");
				$("#settings-form #txthref").val( href );
				$("#settings-form #href").css({"display": "initial"});
				break;
			case("parent-widthpx"):
				var width = parseFloat( element.parent().css("width") );
				$("#settings-form #txtwidth").val( width + "px" );
				$("#settings-form #width").css({"display": "initial"});
				break;
			case("parent-widthpc"):
				var width = parseFloat( element.parent().css("width") );
				var parent_width = parseFloat( element.parent().parent().css("width") );
				$("#settings-form #txtwidth").val( parseInt( ( width / parent_width ) * 100 ) + "%" );
				$("#settings-form #width").css({"display": "initial"});
				break;
			case("parent-heightpx"):
				var height = parseFloat( element.parent().css("height") );
				$("#settings-form #txtheight").val( height + "px" );
				$("#settings-form #height").css({"display": "initial"});
				break;
			case("parent-heightpc"):
				var height = parseFloat( element.parent().css("height") );
				var parent_height = parseFloat( element.parent().parent().css("height") );
				$("#settings-form #txtheight").val( parseInt( ( height / parent_height ) * 100 ) + "%" );
				$("#settings-form #height").css({"display": "initial"});
				break;
			case("parent-toppx"):
				var top = parseFloat( element.parent().css("top") );
				$("#settings-form #txttop").val(top + "px" );
				$("#settings-form #top").css({"display": "initial"});
				break;
			case("parent-toppc"):
				var top = parseFloat( element.parent().css("top") );
				var height = parseFloat( element.parent().parent().css("height") );
				$("#settings-form #txttop").val( parseInt( ( top / height ) * 100 ) + "%" );
				$("#settings-form #top").css({"display": "initial"});
				break;
			case("parent-rightpx"):
				var right = parseFloat( element.parent().css("right") );
				$("#settings-form #txtright").val(right + "px" );
				$("#settings-form #right").css({"display": "initial"});
				break;
			case("parent-rightpc"):
				var right = parseFloat( element.parent().css("right") );
				var height = parseFloat( element.parent().parent().css("height") );
				$("#settings-form #txtright").val( parseInt( ( right / height ) * 100 ) + "%" );
				$("#settings-form #right").css({"display": "initial"});
				break;
			case("parent-bottompx"):
				var bottom = parseFloat( element.parent().css("bottom") );
				$("#settings-form #txtbottom").val(bottom + "px" );
				$("#settings-form #bottom").css({"display": "initial"});
				break;
			case("parent-bottompc"):
				var bottom = parseFloat( element.parent().css("bottom") );
				var height = parseFloat( element.parent().parent().css("height") );
				$("#settings-form #txtbottom").val( parseInt( ( bottom / height ) * 100 ) + "%" );
				$("#settings-form #bottom").css({"display": "initial"});
				break;
			case("parent-leftpx"):
				var left = parseFloat( element.parent().css("left") );
				$("#settings-form #txtleft").val(left + "px" );
				$("#settings-form #left").css({"display": "initial"});
				break;
			case("parent-leftpc"):
				var left = parseFloat( element.parent().css("left") );
				var height = parseFloat( element.parent().parent().css("height") );
				$("#settings-form #txtleft").val( parseInt( ( left / height ) * 100 ) + "%" );
				$("#settings-form #left").css({"display": "initial"});
				break;
			case("parent-vposition"):
				var bottom = parseFloat( element.parent().css("bottom") );
				var height = parseFloat( element.parent().parent().css("height") );
				if( bottom >  height / 2 ){
					$("#settings-form #vposition #opttop").attr({"checked": true});
				}else{
					if( bottom <  height / 2 ){
						$("#settings-form #vposition #optbottom").attr({"checked": true});
					}else{
						$("#settings-form #vposition #optmiddle").attr({"checked": true});
					}
				}
				$("#settings-form #vposition").css({"display": "initial"});
				break;
			case("parent-hposition"):
				var right = parseFloat( element.parent().css("right") );
				var width = parseFloat( element.parent().parent().css("width") );
				if( right > ( width / 2 ) ){
					$("#settings-form #hposition #optleft").attr({"checked": true});
				}else{
					if( right < ( width / 2 ) ){
						$("#settings-form #hposition #optright").attr({"checked": true});
					}else{
						$("#settings-form #hposition #optcenter").attr({"checked": true});
					}
				}
				$("#settings-form #hposition").css({"display": "initial"});
				break;
			case("parent-backcolor"):
				var color = element.parent().css('backgroundColor');
				$("#settings-form #color #preview").css({"background-color": color});
				color = color.substr( color.indexOf("(") );
				red = parseInt( color.substr( 1, color.indexOf(",") ) );
				color = color.substr( color.indexOf(",") + 1 );
				green = parseInt( color.substr( 1, color.indexOf(",") ) );
				color = color.substr( color.indexOf(",") + 1 );
				if( color.indexOf(",") > 0 ){
					blue = parseInt( color.substr( 1, color.indexOf(",") ) );
				}else{
					blue = parseInt( color.substr( 1, color.indexOf(")") ) );
				}
				$("#settings-form #color #red").next().css({"left": red});
				$("#settings-form #color #green").next().css({"left": green});
				$("#settings-form #color #blue").next().css({"left": blue});
				$("#settings-form #color").css({"display": "initial"});
				break;
			case("parent-bordercolor"):
				var color = element.parent().css('borderColor');
				$("#settings-form #bordercolor #preview").css({"background-color": color});
				color = color.substr( color.indexOf("(") );
				red = parseInt( color.substr( 1, color.indexOf(",") ) );
				color = color.substr( color.indexOf(",") + 1 );
				green = parseInt( color.substr( 1, color.indexOf(",") ) );
				color = color.substr( color.indexOf(",") + 1 );
				if( color.indexOf(",") > 0 ){
					blue = parseInt( color.substr( 1, color.indexOf(",") ) );
				}else{
					blue = parseInt( color.substr( 1, color.indexOf(")") ) );
				}
				$("#settings-form #bordercolor #red").next().css({"left": red});
				$("#settings-form #bordercolor #green").next().css({"left": green});
				$("#settings-form #bordercolor #blue").next().css({"left": blue});
				$("#settings-form #bordercolor").css({"display": "initial"});
				break;
			case("parent-textalign"):
				var textalign = element.parent().css("text-align");
				$("#settings-form #text-align #optt" + textalign).attr({"checked": true});
				$("#settings-form #text-align").css({"display": "initial"});
				break;
			case("parent-backimage"):
				var src = element.parent().css("background-image");
				var puresrc = src.replace('url("', '').replace('")', '');
				$("#settings-form #src #browse").attr({"value": puresrc});
				$("#settings-form #src #preview").css({"background-image": src});
				$("#settings-form #src").css({"display": "initial"});
				break;
			case("parent-src"):
				var src = element.parent().attr("src");
				$("#settings-form #src #browse").attr({"value": src});
				$("#settings-form #src #preview").css({"background-image": "url('" + src + "')"});
				$("#settings-form #src").css({"display": "initial"});
				break;
			case("parent-font"):
				var family = element.parent().css("font-family");
				var size = parseInt( element.parent().css("font-size") );
				var weight = element.parent().css("font-weight").toString().toLowerCase();
				var style = element.parent().css("font-style").toString().toLowerCase();
				var color = element.parent().css('color');
				$("#settings-form #font #family").val( family );
				$("#settings-form #font #font-preview").css({"font-family": family});
				$("#settings-form #font #size").val( size );
				$("#settings-form #font #font-preview").css({"font-size": size });
				$("#settings-form #font #weight").attr({"checked": false});
				$("#settings-form #font #font-preview").css({"font-weight": "normal"});
				if( weight === "bold" ){
					$("#settings-form #font #weight").attr({"checked": true});
					$("#settings-form #font #font-preview").css({"font-weight": "bold"});
				}
				$("#settings-form #font #style").attr({"checked": false});
				$("#settings-form #font #font-preview").css({"font-style": "normal"});
				if( style === "italic" ){
					$("#settings-form #font #style").attr({"checked": true});
					$("#settings-form #font #font-preview").css({"font-style": "italic"});
				}
				$("#settings-form #color #font-preview").css({"color": color});
				color = color.substr( color.indexOf("(") );
				red = parseInt( color.substr( 1, color.indexOf(",") ) );
				color = color.substr( color.indexOf(",") + 1 );
				green = parseInt( color.substr( 1, color.indexOf(",") ) );
				color = color.substr( color.indexOf(",") + 1 );
				if( color.indexOf(",") > 0 ){
					blue = parseInt( color.substr( 1, color.indexOf(",") ) );
				}else{
					blue = parseInt( color.substr( 1, color.indexOf(")") ) );
				}
				$("#settings-form #font #red").next().css({"left": red});
				$("#settings-form #font #green").next().css({"left": green});
				$("#settings-form #font #blue").next().css({"left": blue});
				
				$("#settings-form #font").css({"display": "initial"});
				break;

			default:
				alert( settings[c] );
		}
	}
	$("#settings-form").attr({"settings": settings});
	$("#settings-form-glass").css({"transform": "scaleY(1)"});
	dis = element;
}

/* ---------------------------------------------------------------------------------------------------- */
$(function(){
	$("#content img").mousedown(function(){
		return false;
	});
	
	document.ondragleave = function(){
		$("#locator").remove();
	};
	
	$("#pages-menu .items-list button").click(function(){
		var type = $("#pages-menu .items-list button:disabled").attr("type");
		var id = $("#pages-menu .items-list button:disabled").attr("id");
		var script = ".";
		$(".sub-menu button").attr({"disabled": false});
		$(".loading").css({"display": "initial"});
		$("#content").html( ' ' );
		$.post( "/designer/functions.php", { operation: "read_design", type: type, id: id } )
		.done(function( design ){
			$("#content").html( first_module );
			if( design )
				$("#content").html( '<center>' + design + '</center>' );
			$(".loading").css({"display": "none"});
		});
	});
	
	$("#settings-form #cancel").click(function(){
		$("#settings-form-glass").css({"transform": "scaleY(0)"});
	});
	
/* Settings Functions -------------------------------------------------- */
	
	/* color controller ------------------------------------------------ */
	$("#color .bar").mousedown(function( event ){
		pointer_drag = true;
		pointer_name = $(this).attr("id");
		var mouseX = ( event.pageX );
		var barX = $(this).offset().left;
		var position = parseInt( mouseX - barX - 3 )
		$(this).next().css({"left": position + "px"});
		var red = parseInt( $("#color #red").next().css("left") );
		var green = parseInt( $("#color #green").next().css("left") );
		var blue = parseInt( $("#color #blue").next().css("left") );
		var color = "rgb(" + red + ", " + green + ", " + blue + ")";
		$("#color #preview").css({"background-color": color});
	});
	$("#color .pointer").mousedown(function( event ){
		pointer_drag = true;
		pointer_name = $(this).prev().attr("id");
	});
	$("#color").mousemove(function( event ){
		if( pointer_drag === true ){
		var mouseX = ( event.pageX );
		var barX = $("#color .bar").offset().left;
		var position = parseInt( mouseX - barX - 3 )
		if(position < 0 ){
			position = 0
		}
		if(position > 255 ){
			position = 255
		}
		$("#color #" + pointer_name).next().css({"left": position + "px"});
		var red = parseInt( $("#color #red").next().css("left") );
		var green = parseInt( $("#color #green").next().css("left") );
		var blue = parseInt( $("#color #blue").next().css("left") );
		var color = "rgb(" + red + ", " + green + ", " + blue + ")";
		$("#color #preview").css({"background-color": color});
		}
	});
	/* ----------------------------------------------------------------- */
	
	/* color controller ------------------------------------------------ */
	$("#bordercolor .bar").mousedown(function( event ){
		border_pointer_drag = true;
		border_pointer_name = $(this).attr("id");
		var mouseX = ( event.pageX );
		var barX = $(this).offset().left;
		var position = parseInt( mouseX - barX - 3 )
		$(this).next().css({"left": position + "px"});
		var red = parseInt( $("#bordercolor #red").next().css("left") );
		var green = parseInt( $("#bordercolor #green").next().css("left") );
		var blue = parseInt( $("#bordercolor #blue").next().css("left") );
		var color = "rgb(" + red + ", " + green + ", " + blue + ")";
		$("#bordercolor #preview").css({"background-color": color});
	});
	$("#bordercolor .pointer").mousedown(function( event ){
		border_pointer_drag = true;
		border_pointer_name = $(this).prev().attr("id");
	});
	$("#bordercolor").mousemove(function( event ){
		if( border_pointer_drag === true ){
		var mouseX = ( event.pageX );
		var barX = $("#bordercolor .bar").offset().left;
		var position = parseInt( mouseX - barX - 3 )
		if(position < 0 ){
			position = 0
		}
		if(position > 255 ){
			position = 255
		}
		$("#bordercolor #" + border_pointer_name).next().css({"left": position + "px"});
		var red = parseInt( $("#bordercolor #red").next().css("left") );
		var green = parseInt( $("#bordercolor #green").next().css("left") );
		var blue = parseInt( $("#bordercolor #blue").next().css("left") );
		var color = "rgb(" + red + ", " + green + ", " + blue + ")";
		$("#bordercolor #preview").css({"background-color": color});
		}
	});
	/* ----------------------------------------------------------------- */

	$(document).mouseup(function( event ){
		pointer_drag = false;
		border_pointer_drag = false;
	});
	
	/* font family controller ------------------------------------------ */
	$("#font #family").change(function(){
		$("#font #font-preview").css({"font-family": $("#font #family").val()});
	});
	/* ----------------------------------------------------------------- */
	/* font size controller -------------------------------------------- */
	$("#font #size").change(function(){
		if( $("#font #size").val() < 30 ){
			$("#settings-form #font #font-preview").css({"font-size": $("#font #size").val() + "px" });
		}else{
			$("#settings-form #font #font-preview").css({"font-size": "30px" });
		}
	});
	/* ----------------------------------------------------------------- */
	/* font weight & style controller ---------------------------------- */
	$("#font #weight").change(function(){
		$("#font #font-preview").css({"font-weight": "normal"});
		if( $("#font #weight").attr("checked") )
			$("#font #font-preview").css({"font-weight": "bold"});
	});
	$("#font #style").change(function(){
		$("#font #font-preview").css({"font-style": "normal"});
		if( $("#font #style").attr("checked") )
			$("#font #font-preview").css({"font-style": "italic"});
	});
	/* ----------------------------------------------------------------- */
	/* font color controller ------------------------------------------- */
	$("#font .bar").mousedown(function( event ){
		pointer_drag = true;
		pointer_name = $(this).attr("id");
		var mouseX = ( event.pageX );
		var barX = $(this).offset().left;
		var position = parseInt( mouseX - barX - 3 )
		$(this).next().css({"left": position + "px"});
		var red = parseInt( $("#font #red").next().css("left") );
		var green = parseInt( $("#font #green").next().css("left") );
		var blue = parseInt( $("#font #blue").next().css("left") );
		var color = "rgb(" + red + ", " + green + ", " + blue + ")";
		$("#font-preview").css({"color": color});
	});
	$("#font .pointer").mousedown(function( event ){
		pointer_drag = true;
		pointer_name = $(this).prev().attr("id");
	});
	$("#font").mousemove(function( event ){
		if( pointer_drag === true ){
			var mouseX = ( event.pageX );
			var barX = $("#font .bar").offset().left;
			var position = parseInt( mouseX - barX - 3 )
			if(position < 0 ){
				position = 0
			}
			if(position > 255 ){
				position = 255
			}
			$("#font #" + pointer_name).next().css({"left": position + "px"});
			var red = parseInt( $("#font #red").next().css("left") );
			var green = parseInt( $("#font #green").next().css("left") );
			var blue = parseInt( $("#font #blue").next().css("left") );
			var color = "rgb(" + red + ", " + green + ", " + blue + ")";
			$("#font-preview").css({"color": color});
		}
	});
	$(document).mouseup(function( event ){
		pointer_drag = false;
	});
	/* ----------------------------------------------------------------- */
	
	$("label").live("click", function(){
		//alert("clicked");
	});
	
	$(".mp div").live("click", function(){
		event.preventDefault();
		if( $(this).attr("settings") ){
			var settings = $(this).attr("settings").split(",");
			create_settings_form( $(this), settings );
		}
	});
	
	$(".mp img").live("click", function(){
		event.preventDefault();
		if( $(this).attr("settings") ){
			var settings = $(this).attr("settings").split(",");
			create_settings_form( $(this), settings );
		}
	});
	
	$(".mp p").live("click", function(){
		event.preventDefault();
		if( $(this).attr("settings") ){
			var settings = $(this).attr("settings").split(",");
			create_settings_form( $(this), settings );
		}
	});
		
	$(".mp input").live("click", function(){
		event.preventDefault();
		if( $(this).attr("settings") ){
			var settings = $(this).attr("settings").split(",");
			create_settings_form( $(this), settings );
		}
	});
		
	$(".mp textarea").live("click", function(){
		event.preventDefault();
		if( $(this).attr("settings") ){
			var settings = $(this).attr("settings").split(",");
			create_settings_form( $(this), settings );
		}
	});
		
	$(".mp hr").live("click", function(){
		event.preventDefault();
		if( $(this).attr("settings") ){
			var settings = $(this).attr("settings").split(",");
			create_settings_form( $(this), settings );
		}
	});
		
	$(".mp button").live("click", function( event ){
		event.preventDefault();
		if( $(this).attr("settings") ){
			var settings = $(this).attr("settings").split(",");
			create_settings_form( $(this), settings );
		}
	});
		
	$(".mp menu").live("click", function(){
		if( $(this).attr("settings") ){
			var settings = $(this).attr("settings").split(",");
			create_settings_form( $(this), settings );
		}
	});
	
	$(".mp a").live("click", function(){
		if( $(this).attr("settings") ){
			var settings = $(this).attr("settings").split(",");
			create_settings_form( $(this), settings );
		}
	});
	
	/* ---------------------------------------------------------------------------------------------------------------------------------------------
	$(".col").live("mousemove", function( event ){
		omouseX = ( event.pageX );
		oleft = $(this).offset().left;
		owidth = $(this).width();
		if( omouseX - oleft > 0 && omouseX - oleft < 30 ){
			if( $(this).attr("id") != "col1" )
				$(this).css({"border-left": "3px dashed green"});
		}else{
			$(this).css({"border-left": ""});
		}
		
		if( omouseX - ( oleft + owidth ) < 0 &&  omouseX - ( oleft + owidth ) > -30 ){
			if( $(this).next().attr("id") != undefined )
				$(this).css({"border-right": "3px dashed green"});
		}else{
			$(this).css({"border-right": ""});
		}
	});
	
	$(".col").live("mouseout", function( event ){
		$(this).css({"border": ""});
	});
	
	$(".col").live("mousedown", function( event ){
		mouseX = ( event.pageX );
		left = $(this).offset().left;
		width = $(this).width();
		col_nums = 1;
		while( $(this).parent().find( "#col" + col_nums ).attr("id") != undefined ){
			col_nums++;
		}
		col_nums--;
		if( mouseX - left > 0 && mouseX - left < 30 ){
			// Move left side of (this)
			col = $(this);
			current_width = $(this).width();
			current_prev_width = $(this).prev().width();
			current_x = mouseX;
			
			if( col.attr("id") === "col2" ){
				prev_left = 0;
			}else{
				prev_left = col.prev().offset().left - 17;
			}
			
			change_width = true;
			side = "left";
		}
		if( mouseX - ( left + width ) < 0 &&  mouseX - ( left + width ) > -30 ){
			// Move left side of (this)
			col = $(this);
			current_width = $(this).width();
			current_prev_width = $(this).prev().width();
			current_x = mouseX;
			
			if( col.attr("id") === "col1" ){
				left = 0;
			}else{
				left = col.offset().left - 17;
			}
			
			change_width = true;
			side = "right";
		}
	});
	
	document.onmousemove = function( event ){
		if( change_width === true ){
			switch( side ){
				case( "left" ):
					if( col.attr("id") != "col1" ){
						mouseX = ( event.pageX );
						
						if( col.attr("id") === "col" + col_nums ){
							right = 0;
						}else{
							right = $(document).width() - col.next().offset().left;
						}
						col.css({"width": current_width + current_x - mouseX, "right": right });
						col.prev().css({ "right": "" });
						col.prev().css({ "left": prev_left, "width": col.offset().left - prev_left - 17 });
					}
					break;
					
				case( "right" ):
					if( col.attr("id") != "col" + col_nums ){
						mouseX = ( event.pageX );
						
						col.prev().css({ "right": "" });
						
						if( col.attr("id") === "col" + ( col_nums - 1 ) ){
							right = 0;
						}else{
							right = $(document).width() - col.next().next().offset().left;
						}
						
						col.css({"width": current_width - current_x + mouseX, "left": left });
						col.css({ "right": "" });
						col.next().css({ "right": right });
						col.next().css({ "width": ( $(document).width() - right ) - ( left + col.width() ) - 20 });
					}
					break;
			}
		}
	};
	
	document.onmouseup = function( event ){
		change_width = false;
		for( c = 1; c <= col_nums; c++ ){
			col.parent().find("#col" + c).css({"left": col.parent().find("#col" + c).offset().left - 17});
			col.parent().find("#col" + c).css({"right": ""});
		}
	}
	--------------------------------------------------------------------------------------------------------------------------------------------- */
/* --------------------------------------------------------------------- */

	$("#settings-form #submit").click(function(){
		var settings = $("#settings-form").attr("settings").split(",");
		for( c = 0; c < settings.length; c++ ){
			switch( settings[c] ){
				case("text"):
					dis.text( $("#settings-form #txttext").val() );
					break;
				case("widthpx"):
				case("widthpc"):
					dis.css({"width": $("#settings-form #txtwidth").val()});
					break;
				case("heightpx"):
				case("heightpc"):
					dis.css({"height": $("#settings-form #txtheight").val()});
					break;
				case("toppx"):
				case("toppc"):
					dis.css({"top": $("#settings-form #txttop").val()});
					break;
				case("bottompx"):
				case("bottompc"):
					dis.css({"bottom": $("#settings-form #txtbottom").val()});
					break;
				case("rightpx"):
				case("rightpc"):
					dis.css({"right": $("#settings-form #txtright").val()});
					break;
				case("leftpx"):
				case("leftpc"):
					dis.css({"left": $("#settings-form #txtleft").val()});
					break;
				case("vposition"):
					dis.css({"bottom": $("#settings-form #vposition input:checked").val()});
					break;
				case("hposition"):
					dis.css({"right": $("#settings-form #hposition input:checked").val()});
					break;
				case("backcolor"):
					dis.css({"background-color": $("#settings-form #color #preview").css("background-color")});
					break;
				case("backimage"):
					dis.css({"background-image": "url('" + $("#settings-form #src #browse").attr("value") + "')"});
					break;
				case("bordercolor"):
					dis.css({"border-color": $("#settings-form #bordercolor #preview").css("background-color")});
					break;
				case("src"):
					dis.attr({"src": $("#settings-form #src #browse").attr("value")});
					break;
				case("text-align"):
					dis.css({"text-align": $("#settings-form #text-align input:checked").val()});
					break;
				case("font"):
					dis.css({"font": $("#settings-form #font #font-preview").css("font")});
					dis.css({"color": $("#settings-form #font #font-preview").css("color")});
					dis.css({"font-size": $("#settings-form #font #size").val() + "px"});
					break;

				case("parent-href"):
					dis.parent().attr({ "href": $("#settings-form #txthref").val() });
					break;
				case("parent-widthpx"):
				case("parent-widthpc"):
					dis.parent().css({"width": $("#settings-form #txtwidth").val()});
					break;
				case("parent-heightpx"):
				case("parent-heightpc"):
					dis.parent().css({"height": $("#settings-form #txtheight").val()});
					break;
				case("parent-toppx"):
				case("parent-toppc"):
					dis.parent().css({"top": $("#settings-form #txttop").val()});
					break;
				case("parent-bottompx"):
				case("parent-bottompc"):
					dis.parent().css({"bottom": $("#settings-form #txtbottom").val()});
					break;
				case("parent-rightpx"):
				case("parent-rightpc"):
					dis.parent().css({"right": $("#settings-form #txtright").val()});
					break;
				case("parent-leftpx"):
				case("parent-leftpc"):
					dis.parent().css({"left": $("#settings-form #txtleft").val()});
					break;
				case("parent-vposition"):
					dis.parent().css({"bottom": $("#settings-form #vposition input:checked").val()});
					break;
				case("parent-hposition"):
					dis.parent().css({"right": $("#settings-form #hposition input:checked").val()});
					break;
				case("parent-backcolor"):
					dis.parent().css({"background-color": $("#settings-form #color #preview").css("background-color")});
					break;
				case("parent-bordercolor"):
					dis.parent().css({"border-color": $("#settings-form #bordercolor #preview").css("background-color")});
					break;
				case("parent-textalign"):
					dis.parent().css({"text-align": $("#settings-form #text-align input:checked").val()});
					break;
				case("parent-backimage"):
					dis.parent().css({"background-image": "url('" + $("#settings-form #src #browse").attr("value") + "')"});
					break;
				case("parent-src"):
					dis.parent().attr({"src": $("#settings-form #src #browse").attr("value")});
					break;
				case("parent-font"):
					dis.parent().css({"font": $("#settings-form #font #font-preview").css("font")});
					dis.parent().css({"color": $("#settings-form #font #font-preview").css("color")});
					break;

				default:
					alert( settings[c] );
			}
		}
		$("#settings-form-glass").css({"transform": "scaleY(0)"});
	});

	$("#btnsave").click(function(){
		var type = $("#pages-menu .items-list button:disabled").attr("type");
		var id = $("#pages-menu .items-list button:disabled").attr("id");
		var script = ".";
		$.post( "/designer/functions.php", { operation: "delete_design", type: type, id: id } )
		.done(function( error ){
			module = $("#content").html();
			if( ! $("#content #new-module").attr("id") )
				$.post( "/designer/functions.php", { operation: "save_design", type: type, id: id, module: module, script: script } )
				.done(function( error ){
					if( error ){
						alert( error );
					}
				});
		});
	});
	
	$("#btnpublish").click(function(){
		var type = $("#pages-menu .items-list button:disabled").attr("type");
		var id = $("#pages-menu .items-list button:disabled").attr("id");
		var script = ".";
		$.post( "/designer/functions.php", { operation: "delete_design", type: type, id: id } )
		.done(function( error ){
			module = $("#content").html();
			if( ! $("#content #new-module").attr("id") )
				$.post( "/designer/functions.php", { operation: "save_design", type: type, id: id, module: module, script: script } )
				.done(function( error ){
					if( error ){
						alert( "error: " + error );
					}else{
						if( confirm("لطفا فرآیند تکمیل طراحی صفحه و ساخت آن را تایید کنید.") ){
							$("#content .row").removeAttr("id");
							$("#content .col").removeAttr("id");
							$("#content .mp").removeAttr("id");
							design = $("#content").html();
							$.post( "/designer/functions.php", { operation: "publish_design", type: type, id: id, design: design } )
							.done(function( error ){
								if( error ){
									alert( "error: " + error );
								}else{
									alert( "صفحه ی مورد نظرتان با موفقیت ساخته شد." );
								}
								$.post( "/designer/functions.php", { operation: "read_design", type: type, id: id } )
								.done(function( design ){
									$("#content").html( first_module );
									if( design )
										$("#content").html( '<center>' + design + '</center>' );
								});
							});
						}
					}
				});
		});
	});
	
});