var StartTime = 0;//Genesis Block로 나중에 변경
function Timer() {
    $("#Text_CurrentTPS").text("99");
    setInterval(function () {
        //this.Update_RewardsFas();

        this.line_live_data_test();
        this.Update_TPSCharts();
        this.Update_TotalNodes();
        this.Update_MarKetCap();
        this.Update_SmartContracts();
        this.Update_BlockInformation();
        this.Update_TransactionInformation();
        this.Update_TPSLine();
    }, 1000);


}
function Update_RewardsFas(TotalNode) {
    var TimeStamp = parseInt(new Date().getTime() / 1000) - StartTime;
    var RewardsFas;
    if (StartTime === 0) {
        RewardsFas = "Genesis Block이 생성되지 않음.";
        $("#Text_RewardsFas").text(RewardsFas);
    }
    else {
        RewardsFas = (745386 + 8.6 * TimeStamp) / TotalNode;
        $("#Text_RewardsFas").text(parseInt(RewardsFas));
    }

}
function Update_TotalNodes() {

    $.ajax({
        type: "POST",
        url: "php/DB_ForRead.php",
        dataType: "text",    //옵션이므로 JSON으로 받을게 아니면 안써도 됨
        data: { val: "mysql1", tb: "nodeinfo", fd: "last_insert_id()" },

        success: function (result) {

            $("#Text_TotalNodes").text(result); //통신이 성공적으로 이루어졌을 때 처리하고 싶은 함수
            Update_RewardsFas(result);
        },
        complete: function (result) {
            //통신이 실패했어도 완료가 되었을 때 처리하고 싶은 함수
        },
        error: function (xhr, status, error) {
            //에러가 발생했을 때 처리하고 싶은 함수
            //alert("error");    //경고창 띄움
        }
    });
}
function Update_SmartContracts() {

    $.ajax({
        type: "POST",
        url: "php/DB_ForRead.php",
        dataType: "text",    //옵션이므로 JSON으로 받을게 아니면 안써도 됨
        data: { val: "mysql2", tb: "transactioninfo", fd: "last_insert_id()" },

        success: function (result) {

            $("#Text_SmartContracts").text(result); //통신이 성공적으로 이루어졌을 때 처리하고 싶은 함수
        },
        complete: function (result) {
            //통신이 실패했어도 완료가 되었을 때 처리하고 싶은 함수
        },
        error: function (xhr, status, error) {
            //에러가 발생했을 때 처리하고 싶은 함수
            //alert("error");    //경고창 띄움
        }
    });
}
// 일단 이더리움 기준으로 만들자ㅎㅎㅎㅎ
function Update_MarKetCap() {
    $.ajax({
        type: "GET",
        url: "https://api.coinmarketcap.com/v1/ticker/ethereum/",
        dataType: "json",
        success: function (result) {
            $("#Text_LastPrice").text("$ " + parseFloat(result[0].price_usd).toFixed(2) + " USD");
            $("#Text_Change").text(result[0].percent_change_24h + " % (24H)");
            $("#Text_Volume24H").text(result[0]["24h_volume_usd"] + " FAS");

        },
        error: function (err) {
            //console.log(err);
        }
    });
}
function Update_GenesisTime() {

    $.ajax({
        type: "POST",
        url: "php/DB_ForLimit.php",
        dataType: "text",
        data: { val: "mysql", valopt: "GenesisTime" },

        success: function (result) {
            var check = result.substring(0, 1);
            if (check !== "{") {
                result = result.substring(1, result.length);
            }
            var DataJson = JSON.parse(result);
            StartTime = DataJson.data[0].BlockGenerationTime;

        },
        complete: function (result) {

        },
        error: function (xhr, status, error) {
           // alert("error");
        }
    });
}

function Update_BlockInformation() {

    $.ajax({
        type: "POST",
        url: "php/DB_ForLimit.php",
        dataType: "text",
        data: { val: "mysql", valopt: "BlockInfo" },

        success: function (result) {
            var check = result.substring(0, 1);
            if (check !== "{")
            {
                result = result.substring(1, result.length);
            }
            var DataJson = JSON.parse(result);
            var i = 0;
            $("#Text_TotalBlock").text(DataJson.data[0].BlockNumber);
            for (i = 0; i < 4; i++) {

                $("#Text_BI_BlockNumber" + i).text(DataJson.data[i].BlockNumber);
                $("#Text_BI_CreateTime" + i).text(getTimestampToDate(DataJson.data[i].BlockGenerationTime));
                $("#Text_BI_ServerNeme" + i).text(DataJson.data[i].ServerName);
                $("#Text_BI_PreviousBlock" + i).text(DataJson.data[i].BlockNumber - 1);
                $("#Text_BI_Hash" + i).text(DataJson.data[i].Hash);
            }
            if (StartTime === 0) {
                Update_GenesisTime();
            }


        },
        complete: function (result) {

        },
        error: function (xhr, status, error) {
           // alert("error");
        }
    });
}
function Update_TransactionInformation() {

    $.ajax({
        type: "POST",
        url: "php/DB_ForLimit.php",
        dataType: "text",
        data: { val: "mysql", valopt: "TransactionInformation" },

        success: function (result) {
            var check = result.substring(0, 1);
            if (check !== "{") {
                result = result.substring(1, result.length);
            }
            var DataJson = JSON.parse(result);
            var i = 0;
            $("#Text_TotalBlock").text(DataJson.data[0].BlockNumber);
            for (i = 0; i < 4; i++) {

                $("#Text_TI_Hash" + i).text(DataJson.data[i].Hash);
                $("#Text_TI_CreateTime" + i).text(getTimestampToDate(DataJson.data[i].time));
                $("#Text_TI_From" + i).text(DataJson.data[i].From);
                $("#Text_TI_To" + i).text(DataJson.data[i].To);
                $("#Text_TI_Amount" + i).text(DataJson.data[i].Amount);
            }

        },
        complete: function (result) {

        },
        error: function (xhr, status, error) {
           // alert("error");
        }
    });
}
function getTimestampToDate(timestamp) {

    var date = new Date(timestamp * 1000);

    var chgTimestamp = date.getFullYear().toString()+"-"

        + addZero(date.getMonth() + 1) + "-"

        + addZero(date.getDate().toString()) + " "

        + addZero(date.getHours().toString()) + ":"

        + addZero(date.getMinutes().toString()) + ":"

        + addZero(date.getSeconds().toString());

    return chgTimestamp;

}
function getTimestampToDate2(timestamp) {

    var date = new Date(timestamp * 1000);

    var chgTimestamp =

        addZero(date.getHours().toString()) + ":"

        + addZero(date.getMinutes().toString()) + ":"

        + addZero(date.getSeconds().toString());

    return chgTimestamp;

}
function addZero(data) {

    return (data < 10) ? "0" + data : data;

}


function Update_Charts() {
  //
  //
  //  var container = document.getElementById('tui-chart-widget-ex1');
  //  var data = {
  //      categories: ['01/01/2016', '02/01/2016', '03/01/2016', '04/01/2016', '05/01/2016', '06/01/2016', '07/01/2016', '08/01/2016', '09/01/2016', '10/01/2016', '11/01/2016', '12/01/2016'],
  //      series: [
  //          {
  //              name: 'Seoul',
  //              data: [-3.5, -1.1, 4.0, 11.3, 17.5, 21.5, 24.9, 25.2, 20.4, 13.9, 6.6, -0.6]
  //          },
  //          {
  //              name: 'Seattle',
  //              data: [3.8, 5.6, 7.0, 9.1, 12.4, 15.3, 17.5, 17.8, 15.0, 10.6, 6.4, 3.7]
  //          },
  //          {
  //              name: 'Sydney',
  //              data: [22.1, 22.0, 20.9, 18.3, 15.2, 12.8, 11.8, 13.0, 15.2, 17.6, 19.4, 21.2]
  //          },
  //          {
  //              name: 'Moskva',
  //              data: [-10.3, -9.1, -4.1, 4.4, 12.2, 16.3, 18.5, 16.7, 10.9, 4.2, -2.0, -7.5]
  //          },
  //          {
  //              name: 'Jungfrau',
  //              data: [-13.2, -13.7, -13.1, -10.3, -6.1, -3.2, 0.0, -0.1, -1.8, -4.5, -9.0, -10.9]
  //          }
  //      ]
  //  };
  //
  //  var options = {
  //      chart: {
  //          width: container.getBoundingClientRect().width,
  //          height: 540,
  //          title: '24-hr Average Temperature'
  //      },
  //      yAxis: {
  //          title: 'Temperature (Celsius)',
  //          pointOnColumn: true
  //      },
  //      xAxis: {
  //          title: 'Month',
  //          type: 'datetime',
  //          dateFormat: 'MMM'
  //      },
  //      series: {
  //          showDot: false,
  //          zoomable: true
  //      },
  //      tooltip: {
  //          suffix: '°C'
  //      }
  //  };
  //
  //  tui.chart.lineChart(container, data, options);
  //  alert("error");

}
var ia = 0;

function line_live_data_test() {
    ia++;

}
//var T_timestamp = new Date().getTime();


var ChartsTime = [
    "11:02",
    "11:02",
    "11:02",
    "11:04",
    "11:05",
    "11:06",
    "11:07",
    "11:08",
    "11:09",
    "11:10"];

var tpsc = [
    "0",
    "0",
    "0",
    "0",
    "0",
    "0",
    "0",
    "0",
    "0",
    "0"];
function formatDate(date) {
    for (var i = 0; i < 10; i++) {
        date.setSeconds(date.getSeconds() - 1);
        ChartsTime[i] = addZero(date.getHours()) + ':' + addZero(date.getMinutes()) + ':' + addZero(date.getSeconds());

    }
    //console.log(timestamp = new Date().getTime());

}
var a = [
    "0",
    "0",
    "0",
    "0",
    "0",
    "0",
    "0",
    "0",
    "0",
    "0"];
function Update_TPSLine() {

        $.ajax({
            type: "POST",
            url: "php/DB_ForRead.php",
            dataType: "text",
            data: { val: "mysql3", valopt: "TPS", tb: "tps", time: "13:23:37" },
            success: function (result) {
                var check = result.substring(0, 1);
                if (check !== "{") {
                    result = result.substring(1, result.length);
                }

                var DataJson = JSON.parse(result);
                alert("s");
               // for (var i = 0; i < 10; i++) {
               //
               //   // tpsc[i] = result[i]["TPS"];
               //     alert(result[i]);
               // }
                //
                //tpsc[i] = DataJson[i];
                //tpsc[i] = DataJson.data[0].TPS.toString();

            },
            complete: function (result) {

            },
            error: function (xhr, status, error) {
                // alert("error");
            }
        });

}
function getRandomInt(min, max) { //min ~ max 사이의 임의의 정수 반환
    return Math.floor(Math.random() * (max - min)) + min;
}

function Update_TPSCharts() {

    //for (var r = 0; r < 10; r++) {
    //    tpsc[r] = getRandomInt(5000, 15000);
    //        }
    var now = new Date();
    formatDate(now);


    $(document).ready(function () {


            var e = document.getElementById("ecommerce-widget-d-chart");
            if (e) {
                echarts.init(e).setOption({
                    title: null, legend: null, toolbox: null, tooltip: { show: !1 }, grid: { left: 0, right: 0, bottom: 0, top: 0 }, label: !1, series: [{
                        type: "pie",
                        hoverAnimation: !1,
                        radius: "100%",
                        center: ["50%", "50%"],
                        selectedMode: "single",
                        selectedOffset: 0,
                        label: { normal: { show: !1 } },
                        labelLine: { normal: { show: !1 } },
                        data: [{
                            value: 20, name: "Pending",
                            itemStyle: { normal: { color: "#9579da" } }
                        },
                        { value: 10, name: "Abadon", itemStyle: { normal: { color: "#eb86be" } } },
                        { value: 70, name: "Completed", itemStyle: { normal: { color: "#f4d0b5" } } }]
                    }]
                },
                    !0)
            }
            var l = $("#ecommerce-widget-e-chart");
            if (l.length) {
                echarts.init(l.get(0)).setOption({
                    tooltip: { trigger: "axis" },
                    title: null, legend: null, toolbox: null,
                    grid: { top: 10, right: 50, left: 50, bottom: 40 },
                    xAxis: [{
                        type: "category", boundaryGap: !1,
                        data: [ChartsTime[0], ChartsTime[1], ChartsTime[2], ChartsTime[3], ChartsTime[4], ChartsTime[5], ChartsTime[6], ChartsTime[7], ChartsTime[8], ChartsTime[9]],
                        axisLine: { lineStyle: { color: "#e9ebee" } },
                        axisTick: { show: !1 },
                        splitLine: { lineStyle: { color: "#e9ebee" } },
                        axisLabel: {
                            margin: 20, fontFamily: "Open Sans",
                            fontSize: 12, color: "#939daa"
                        }
                    }],
                    yAxis: [{
                        splitLine: { lineStyle: { color: "#e9ebee" } },
                        axisLine: { lineStyle: { color: "#e9ebee" } },
                        axisTick: { show: !1 }, max: 15000, min: 5000, axisLabel: {
                            fontFamily: "Open Sans",
                            fontSize: 12, color: "#939daa"
                        }
                    }],
                    series: [{
                        type: "line",
                        data: [tpsc[0], tpsc[1], tpsc[2], tpsc[3], tpsc[4], tpsc[5], tpsc[6], tpsc[7], tpsc[8], tpsc[9]],
                        showSymbol: !1, lineStyle: { normal: { color: "#eb5463" } }
                    }]//,
                   // {
                   //     type: "line",
                   //     data: [500, 382, 491, 334, 290, 330, 310],
                   //     showSymbol: !1, lineStyle: { normal: { color: "#A7CF7A" } }
                   // },
                   // {
                   //     type: "line", data: [150, 232, 101, 154, 190, 530, 110],
                   //     showSymbol: !1, lineStyle: { normal: { color: "#3aadd9" } }
                   // }
                },
                    !0)
            }
        })










}
