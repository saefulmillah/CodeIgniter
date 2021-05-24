    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        
    </script>
    <script type="text/javascript">
        $(function () {
                var delta_days_array = new Array();
                var table_lhr_monthly = new Array();
                var data;
                var inputVal = 1;
            chartsMonthly(inputVal);
            chartsDaily(inputVal, nama_ruas(inputVal));
            tableLHRMonthly(inputVal);
            tableRevMonthly(inputVal);
            tableLHRDaily(inputVal);
            tableRevDaily(inputVal);
            nama_ruas(inputVal);
            $('#btnSubmit').click(function () {
                // Displaying the value
                inputVal = document.getElementById("ChooseBranch").value;
                chartsMonthly(inputVal, nama_ruas(inputVal));
                chartsDaily(inputVal, nama_ruas(inputVal));
                // alert(inputVal);
                tableLHRMonthly(inputVal);
                tableRevMonthly(inputVal);
                tableLHRDaily(inputVal);
                tableRevDaily(inputVal);
            })
        });

        function chartsMonthly(ruasid, namaruas) {
            var lhr_real_array = new Array();   
            var lhr_fs_array = new Array();
            var rev_real_array = new Array();
            var rev_fs_array = new Array();
            $.getJSON('http://localhost:4444/lhrmonthly/'+ruasid, function(result) {
                    // Populate series
                    data = result.data
                    console.log(data);
                    for (i = 0; i < data.length; i++){
                        lhr_real_array.push([data[i].lhr_real]);
                        lhr_fs_array.push([data[i].lhr_fs]);
                        rev_real_array.push([data[i].revenue_real]);
                        rev_fs_array.push([data[i].revenue_fs]);
                    }
                    
                Highcharts.chart('containerLhr', {
                    chart: {
                        //height: 300,
                        height: (3 / 16 * 100) + '%' // 16:9 ratio
                    },
                    title: {
                        text: null,
                    },

                    subtitle: {
                        text: 'Source: Ruas Bakauheni - Terbanggi Besar',
                        enabled: false
                    },

                    yAxis: {
                        title: {
                            text: 'Number of Employees',
                            enabled: false
                        }
                    },

                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    },

                    legend: {
                        enabled: false
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            pointEnd: 'Dec'
                        }
                    },

                    series: [{
                        name: '(LHR) FS',
                        data: lhr_fs_array, 
                        color: '#FF0000'
                    }, {
                        name: '(LHR) Real',
                        data: lhr_real_array,
                        color: '#02b331'
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

                });
                Highcharts.chart('containerRevenue', {
                    chart: {
                        //height: 300,
                        height: (3 / 16 * 100) + '%' // 16:9 ratio
                    },
                    title: {
                        text: null,
                    },

                    subtitle: {
                        text: 'Source: Ruas Bakauheni - Terbanggi Besar',
                        enabled: false
                    },

                    yAxis: {
                        title: {
                            text: 'Number of Employees',
                            enabled: false
                        }
                    },

                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        //   accessibility: {
                        //       rangeDescription: 'Range: 2011 to 2019'
                        //   }
                    },

                    legend: {
                        enabled: false
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            pointEnd: 'Dec'
                        }
                    },

                    series: [{
                        name: 'Pendapatan (FS)',
                        data: rev_fs_array, 
                        color: '#FF0000'
                    }, {
                        name: 'Pendapatan (Real)',
                        data: rev_real_array,
                        color: '#02b331'
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

                });
            });
        }

        function chartsDaily(ruasid, namaruas) {
            var delta_days_array = new Array();
            var lhr_real_daily_array = new Array();
            var lhr_fs_daily_array = new Array();
            var rev_real_daily_array = new Array();
            var rev_fs_daily_array = new Array();
            var dataDaily = 0;
            var delta_days = 0;
            $.getJSON('http://localhost:4444/lhrdaily/'+ruasid, function(result) {
            // Populate series
            dataDaily = result.data;
            lhr_real_daily_array = [];
            lhr_fs_daily_array = [];
            rev_real_daily_array = [];
            rev_fs_daily_array = [];

            if (dataDaily.length > 0) {
                delta_days = result.data[0].delta_days;
                for (i = 0; i < delta_days; i++){
                    delta_days_array.push([i+1]);
                    if (typeof dataDaily[i]=='undefined'){
                        lhr_real_daily_array.push([0]);
                        lhr_fs_daily_array.push([0]);
                        rev_real_daily_array.push([0]);
                        rev_fs_daily_array.push([0]);
                    } else {
                        lhr_real_daily_array.push([dataDaily[i].lhr_real]);
                        lhr_fs_daily_array.push([dataDaily[i].lhr_fs]);
                        rev_real_daily_array.push([dataDaily[i].revenue_real]);
                        rev_fs_daily_array.push([dataDaily[i].revenue_fs]);
                    }
                }
            }             
                Highcharts.chart('containerLhrDaily', {
                    chart: {
                        //height: 300,
                        height: (2 / 16 * 100) + '%' // 16:9 ratio
                    },
                    title: {
                        text: null,
                    },

                    subtitle: {
                        text: 'Source: Ruas '+namaruas,
                        enabled: false
                    },

                    yAxis: {
                        title: {
                            text: 'Number of Employees',
                            enabled: false
                        }
                    },

                    xAxis: {
                        categories: delta_days_array,
                        //   accessibility: {
                        //       rangeDescription: 'Range: 2011 to 2019'
                        //   }
                    },

                    legend: {
                        enabled: false
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            pointEnd: 'Dec'
                        }
                    },

                    series: [{
                        name: 'FS',
                        data: lhr_fs_daily_array, 
                        color: '#FF0000'
                    }, {
                        name: 'Real',
                        data: lhr_real_daily_array,
                        color: '#02b331'
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

                });

                Highcharts.chart('containerRevDaily', {
                    chart: {
                        //height: 300,
                        height: (2 / 16 * 100) + '%' // 16:9 ratio
                    },
                    title: {
                        text: null,
                    },

                    subtitle: {
                        text: 'Source: Ruas Bakauheni - Terbanggi Besar',
                        enabled: false
                    },

                    yAxis: {
                        title: {
                            text: 'Number of Employees',
                            enabled: false
                        }
                    },

                    xAxis: {
                        categories: delta_days_array,
                        //   accessibility: {
                        //       rangeDescription: 'Range: 2011 to 2019'
                        //   }
                    },

                    legend: {
                        enabled: false
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            pointEnd: 'Dec'
                        }
                    },

                    series: [{
                        name: 'FS',
                        data: rev_fs_daily_array, 
                        color: '#FF0000'
                    }, {
                        name: 'Real',
                        data: rev_real_daily_array,
                        color: '#02b331'
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

                });    
            });
        }

        function tableLHRMonthly(ruasid) {
            $.getJSON('http://localhost:4444/tablelhrmonthly/'+ruasid, function (result) {
                $('#tbl-lhr-monthly').DataTable().destroy();
                $('#tbl-lhr-monthly').DataTable({
                    info : false, 
                    paging : false,
                    filter : false,
                    data : result.data,
                    "columns": [
                        { "data": "Tipe" },
                        { "data": "Jan" },
                        { "data": "Feb" },
                        { "data": "Mar" },
                        { "data": "Apr" },
                        { "data": "Mei" },
                        { "data": "Jun" },
                        { "data": "Jul" },
                        { "data": "Agu" },
                        { "data": "Sep" },
                        { "data": "Okt" },
                        { "data": "Nov" },
                        { "data": "Des" },                            
                    ]
                });
            });
        }

        function tableRevMonthly(ruasid) {
            $.getJSON('http://localhost:4444/tablerevmonthly/'+ruasid, function (result) {
                $('#tbl-rev-monthly').DataTable().destroy();
                $('#tbl-rev-monthly').DataTable({
                    info : false, 
                    paging : false,
                    filter : false,
                    responsive: true,
                    data : result.data,
                    "columns": [
                        { "data": "Tipe" },
                        { "data": "Jan" },
                        { "data": "Feb" },
                        { "data": "Mar" },
                        { "data": "Apr" },
                        { "data": "Mei" },
                        { "data": "Jun" },
                        { "data": "Jul" },
                        { "data": "Agu" },
                        { "data": "Sep" },
                        { "data": "Okt" },
                        { "data": "Nov" },
                        { "data": "Des" },                            
                    ]
                });
            });
        }

        function tableLHRDaily(ruasid) {
            $.getJSON('http://localhost:4444/tablelhrdaily/'+ruasid, function (result) {
                $('#tbl-lhr-daily').DataTable().destroy();
                $('#tbl-lhr-daily').DataTable({
                    info : false, 
                    paging : false,
                    filter : false,
                    data : result.data,
                    "columns": [
                        { "data": "Tipe" },
                        { "data": "01" },
                        { "data": "02" },
                        { "data": "03" },
                        { "data": "04" },
                        { "data": "05" },
                        { "data": "06" },
                        { "data": "07" },
                        { "data": "08" },
                        { "data": "09" },
                        { "data": "10" },
                        { "data": "11" },
                        { "data": "12" },    
                        { "data": "13" },
                        { "data": "14" },
                        { "data": "15" },
                        { "data": "16" },
                        { "data": "17" },
                        { "data": "18" },
                        { "data": "19" },
                        { "data": "20" },
                        { "data": "21" },
                        { "data": "22" },
                        { "data": "23" },
                        { "data": "24" },  
                        { "data": "25" },
                        { "data": "26" },
                        { "data": "27" },
                        { "data": "28" },
                        { "data": "29" },
                        { "data": "30" },
                        { "data": "31" },                                                       
                    ]
                });
            });
        }

        function tableRevDaily(ruasid) {
            $.getJSON('http://localhost:4444/tablerevdaily/'+ruasid, function (result) {
                $('#tbl-rev-daily').DataTable().destroy();
                $('#tbl-rev-daily').DataTable({
                    info : false, 
                    paging : false,
                    filter : false,
                    data : result.data,
                    "columns": [
                        { "data": "Tipe" },
                        { "data": "01" },
                        { "data": "02" },
                        { "data": "03" },
                        { "data": "04" },
                        { "data": "05" },
                        { "data": "06" },
                        { "data": "07" },
                        { "data": "08" },
                        { "data": "09" },
                        { "data": "10" },
                        { "data": "11" },
                        { "data": "12" },    
                        { "data": "13" },
                        { "data": "14" },
                        { "data": "15" },
                        { "data": "16" },
                        { "data": "17" },
                        { "data": "18" },
                        { "data": "19" },
                        { "data": "20" },
                        { "data": "21" },
                        { "data": "22" },
                        { "data": "23" },
                        { "data": "24" },  
                        { "data": "25" },
                        { "data": "26" },
                        { "data": "27" },
                        { "data": "28" },
                        { "data": "29" },
                        { "data": "30" },
                        { "data": "31" },                                                       
                    ]
                });
            });            
        }

        function nama_ruas(ruasid) {
            var nama_ruas = 'JORR-S';
            if (ruasid==1) {
                nama_ruas = 'JORR-S';
            } else if (ruasid==2) {
                nama_ruas = 'Akses Tanjung Priok'
            } else if (ruasid==3) {
                nama_ruas = 'Medan - Binjai';
            } else if (ruasid==4) {
                nama_ruas = 'Palembang - Indralaya';
            } else if (ruasid==5) {
                nama_ruas = 'Bakauheni - Terbanggi Besar';
            } else if (ruasid==6) {
                nama_ruas = 'Terbanggi Besar - Kayu Agung';
            } else if (ruasid==7) {
                nama_ruas = 'Pekanbaru - Dumai';
            } else if (ruasid==8) {
                nama_ruas = 'Sigli - Banda Aceh';
            } 

            return nama_ruas;
        }
    </script>
  </body>
</html>