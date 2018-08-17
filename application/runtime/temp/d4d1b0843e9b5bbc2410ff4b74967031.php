<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"E:\shop\public/../application/admin\view\echarts\echarts2.html";i:1531461472;}*/ ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-堆叠柱状统计图</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="../../static/css/font.css">
    <link rel="stylesheet" href="../../static/css/weadmin.css">
</head>

<body>
    <div class="weadmin-body">
        <blockquote class="layui-elem-quote">
            特别声明：ECharts，一个纯 Javascript 的图表库，可以流畅的运行在 PC 和移动设备上，兼容当前绝大部分浏览器（IE8/9/10/11，Chrome，Firefox，Safari等），底层依赖轻量级的 Canvas 类库 ZRender，提供直观，生动，可交互，可高度个性化定制的数据可视化图表。WeAdmin提示：如需使用或者详细更多案例可以访问官网
            <a href="http://echarts.baidu.com/" style="color:red">ECharts</a>。
        </blockquote>
        <!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->
        <div id="main" style="width: 100%;height:400px;"></div>
    </div>
    <script src="../../lib/echarts/echarts.js"></script>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        // var labelRight = {
        //     normal: {
        //         position: 'right'
        //     }
        // };
        // option = {
        //     title: {
        //         text: '交错正负轴标签',
        //         subtext: 'From ExcelHome',
        //         sublink: 'http://e.weibo.com/1341556070/AjwF2AgQm'
        //     },
        //     tooltip : {
        //         trigger: 'axis',
        //         axisPointer : {            // 坐标轴指示器，坐标轴触发有效
        //             type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        //         }
        //     },
        //     grid: {
        //         top: 80,
        //         bottom: 30
        //     },
        //     xAxis: {
        //         type : 'value',
        //         position: 'top',
        //         splitLine: {lineStyle:{type:'dashed'}},
        //     },
        //     yAxis: {
        //         type : 'category',
        //         axisLine: {show: false},
        //         axisLabel: {show: false},
        //         axisTick: {show: false},
        //         splitLine: {show: false},
        //         data : ['ten', 'nine', 'eight', 'seven', 'six', 'five', 'four', 'three', 'two', 'one']
        //     },
        //     series : [
        //         {
        //             name:'生活费',
        //             type:'bar',
        //             stack: '总量',
        //             label: {
        //                 normal: {
        //                     show: true,
        //                     formatter: '{b}'
        //                 }
        //             },
        //             data:[
        //                 {value: -0.07, label: labelRight},
        //                 {value: -0.09, label: labelRight},
        //                 0.2, 0.44,
        //                 {value: -0.23, label: labelRight},
        //                 0.08,
        //                 {value: -0.17, label: labelRight},
        //                 0.47,
        //                 {value: -0.36, label: labelRight},
        //                 0.18
        //             ]
        //         }
        //     ]
        // };
        myChart.title = '堆叠柱状图';

        option = {
            tooltip: {
                trigger: 'axis',
                axisPointer: { // 坐标轴指示器，坐标轴触发有效
                    type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
                }
            },
            legend: {
                data: ['直接访问', '邮件营销', '联盟广告', '视频广告', '搜索引擎', '百度', '谷歌', '必应', '其他']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [{
                type: 'category',
                data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
            }],
            yAxis: [{
                type: 'value'
            }],
            series: [{
                    name: '直接访问',
                    type: 'bar',
                    data: [320, 332, 301, 334, 390, 330, 320]
                },
                {
                    name: '邮件营销',
                    type: 'bar',
                    stack: '广告',
                    data: [120, 132, 101, 134, 90, 230, 210]
                },
                {
                    name: '联盟广告',
                    type: 'bar',
                    stack: '广告',
                    data: [220, 182, 191, 234, 290, 330, 310]
                },
                {
                    name: '视频广告',
                    type: 'bar',
                    stack: '广告',
                    data: [150, 232, 201, 154, 190, 330, 410]
                },
                {
                    name: '搜索引擎',
                    type: 'bar',
                    data: [862, 1018, 964, 1026, 1679, 1600, 1570],
                    markLine: {
                        lineStyle: {
                            normal: {
                                type: 'dashed'
                            }
                        },
                        data: [
                            [{
                                type: 'min'
                            }, {
                                type: 'max'
                            }]
                        ]
                    }
                },
                {
                    name: '百度',
                    type: 'bar',
                    barWidth: 5,
                    stack: '搜索引擎',
                    data: [620, 732, 701, 734, 1090, 1130, 1120]
                },
                {
                    name: '谷歌',
                    type: 'bar',
                    stack: '搜索引擎',
                    data: [120, 132, 101, 134, 290, 230, 220]
                },
                {
                    name: '必应',
                    type: 'bar',
                    stack: '搜索引擎',
                    data: [60, 72, 71, 74, 190, 130, 110]
                },
                {
                    name: '其他',
                    type: 'bar',
                    stack: '搜索引擎',
                    data: [62, 82, 91, 84, 109, 110, 120]
                }
            ]
        };




        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>

</body>

</html>