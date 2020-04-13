
<script src="<?php echo base_url("assets/chartorg/getorgchart.js")?>"></script>
    
<link href="<?php echo base_url("assets/chartorg/getorgchart.css")?>" rel="stylesheet" />
	


<style type="text/css" id="myStylesheet">
        html, body {
            margin: 0px;
            padding: 0px;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #people {
            width: 100%;
            height: 100%;
        }
    </style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Structure</li>

      </ol>
    
    </section>
    <section class="content">
      <div class="row">
       <div class="col-lg-12 ">
    
        <div id="people"></div>

    <script type="text/javascript">       

        function isNumeric(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }


        var hex2rgb = function (hex) {
            var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            return result ? [
                parseInt(result[1], 16),
                parseInt(result[2], 16),
                parseInt(result[3], 16)
            ] : null;
        };

        var rgb2hex = function (rgb) {
            return "#" + ((1 << 24) + (rgb[0] << 16) + (rgb[1] << 8) + rgb[2]).toString(16).slice(1);
        };

        var interpolateColor = function (color1, color2, factor) {
            if (arguments.length < 3) { factor = 0.5; }
            var result = color1.slice();
            for (var i = 0; i < 3; i++) {
                result[i] = Math.round(result[i] + factor * (color2[i] - color1[i]));
            }
            return result;
        };

        var source = [
               <?php   foreach ($structure as $str) {?>
                { id: <?php echo $str->id ?>, parentId: <?php if($str->parent_id == "")
                    echo "null";
                    else
                        echo $str->parent_id;
                     ?> , name: "<?php echo $str->actor_name; ?>", actor_role: "<?php echo $str->actor_role; ?>", status: "1", actor_position: "<?php echo $str->actor_position; ?>"},
                <?php }?>

        ];



        var start = hex2rgb("#ff0000");
        var end = hex2rgb("#1eff00");
        var max = null;
        var min = null;
        var factor = null;

        function setFactor(chart) {
            max = null;
            min = null;
            for (var id in chart.nodes) {
                var node = chart.nodes[id];
                if (node.data["status"]) {
                    var status = node.data["status"].replace("$", "");
                    if (isNumeric(status)) {
                        if (max == null && min == null) {
                            max = status;
                            min = status;
                        }
                        else {
                            max = Math.max(status, max);
                            min = Math.min(status, min);
                        }
                    }
                }
            }
            factor = (max - min) / 100;
        }
        var peopleElement = document.getElementById("people");
        var orgChart = new getOrgChart(peopleElement, {
            primaryFields: ["name" , "actor_role" ,"actor_position"],
			secondParentIdField: "subparentId",
            enableEdit: false,
            enableDetailsView: false,
            enableGridView: true,
			linkType: "B",
            enableExportToImage: true,
            dataSource: source,
            layout: getOrgChart.MIXED_HIERARCHY_RIGHT_LINKS,
            renderNodeEvent: renderNodeEventHandler,
            
        });        

        function renderNodeEventHandler(sender, args) {
            var status = args.node.data["status"].replace("$", "");
            if (!isNumeric(status)) {
                return;
            }

            if (!factor) {
                setFactor(sender);
            }

            var val = (status - min) / factor;
            var rgb = interpolateColor(start, end, val / 100);
            var hex = rgb2hex(rgb);
            args.content[1] = args.content[1].replace("rect", "rect style='fill: " + hex + "; stroke: " + hex + ";'")
        }
            </script>
        </div>
    </div>
</section>
</div>