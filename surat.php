<html>

<head>

    <title></title>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.223/styles/kendo.common.min.css" />


    <script src="https://kendo.cdn.telerik.com/2017.1.223/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.1.223/js/jszip.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.1.223/js/kendo.all.min.js"></script>
</head>

<body>
    <div id="example">


        <div class="box wide hidden-on-narrow">
            <div class="box-col">
                <h4>Select Page size</h4>
                <select id="paper" style="width: 100px;">
                    <option value="size-a4" selected>A4</option>
                    <option value="size-letter">F4</option>
                    <option value="size-executive">Executive</option>
                </select>
            </div>
            <br><br>
            <br><br>
            <div class="box-col">
                <a href="{{ route('perusahaan.order-index') }}">
                    <button class="export-pdf k-button">Kembali</button>
                </a>
                <button class="export-pdf k-button" onclick="getPDF('.pdf-page')">Download PDF</button>
            </div>
        </div>
        <div class="page-container hidden-on-narrow">

            <div class="pdf-page size-a4">
                <div class="row">
                    <div class="column">
                        <img width="90"
                            src="data:image/png;base64,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"
                            alt="">
                    </div>

                    <div class="column" style="float: right">
                        <img width="70" src="{{ asset('js/ISOCERTIFICATE.png') }}" alt="">
                    </div>
                    <p class="text-center" style="color: black">
                        <span class="text-header">PT. MARSTECH GLOBAL</span> <br>
                        <span class="text-body">JL. BULU MAS II NO. 1 KANIGORO - KARTOHARJO - MADIUN - JAWA
                            TIMUR</span><br>
                        <span class="text-body">Telp. 0821 4096 6279</span><br>
                        <span class="text-footer">E-mail. <u style="color: #0081dd">group.marstech@gmail.com</u> web.
                            marstech.co.id</span><br>
                        <span class="text-footer">SIUP: 503.4/29 MIKRO/ 401.106/ 2018 TDP: 13.13.1.47</span><br>
                        <hr class="new5">
                    </p>
                </div>
                <br>
                <p class="text-center" style="margin-top: 3px">
                    <span class="text-form" style="color: #000000">FORMULIR BERLANGGANAN {{ $data->product->nama
                        }}</span>
                </p>
                <br>
                <div class="header-form" style="color: #000000">
                    <span>I. Identitas Perusahaan</span>
                    <table class="customTable">
                        <tbody>

                            <tr>
                                <td style="width: 40%">1. Nama Perusahaan</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->nama_perusahaan }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">2. Alamat Perusahaan</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->alamat }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">3. No Telepon</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->no_telp }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">4. Fax</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->fax }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">5. Website</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->website }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">6. Email</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->email }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">7. Bank Umum</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->bank_umum }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">8. No Rek. Bank Umum</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->no_rek_umum }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <span>II. Identitas Direktur & Contact Person</span>
                    <table class="customTable">
                        <tbody>

                            <tr>
                                <td style="width: 40%">1. Nama/ Jabatan</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->nama_direktur }},
                                    {{auth()->user()->perusahaan->jabatan_direktur }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">2. No Telepon / HP</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->no_direktur }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">3. Email</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->email_direktur }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">1. Nama / Jabatan</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->nama_cp_1 }},
                                    {{auth()->user()->perusahaan->jabatan_cp_1 }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">2. No Telepon / HP</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->no_cp_1 }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">3. Email</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->email_cp_1 }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">1. Nama / Jabatan</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->nama_cp_2 }},
                                    {{auth()->user()->perusahaan->jabatan_cp_2 }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">2. No Telepon / HP</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->no_cp_2 }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">3. Email</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{auth()->user()->perusahaan->email_cp_2 }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <span>III. ORDER CORE SYSTEM</span>
                    <table class="customTable">
                        <tbody>

                            <tr>
                                <td style="width: 40%">1. Jumlah Lokasi Server</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{ $data->lokasi }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">2. Koneksi Internet</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{ $data->koneksi }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">3. System Operasi</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{ $data->system_operasi }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">4. Software Banking</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{ $data->software_banking }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">5. Jumlah Order Core System</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{ $data->jumlah_order_core_system }}</td>
                            </tr>
                            <tr>
                                <td style="width: 40%">6. Tgl Aktivasi yang di harapkan</td>
                                <td style="width: 5%">:</td>
                                <td style="width: 55%">{{ $data->tgl }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>
                        Dengan ini mengajukan permohonan pemasangan {{ $data->product->nama }}.
                    </p>
                    <p>&nbsp;</p>
                    <p>............................., ......../......../........</p>
                    <br>
                    <br>
                    <br> <br>
                    <br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;<strong>{{auth()->user()->perusahaan->nama_direktur }}</strong></p>


                </div>

                <div class="pdf-footer">

                </div>
            </div>
        </div>

        <div class="responsive-message"></div>

        <style>
            /*
            Use the DejaVu Sans font for display and embedding in the PDF file.
            The standard PDF fonts have no support for Unicode characters.
        */
            .pdf-page {
                font-family: "DejaVu Sans", "Arial", sans-serif;
            }
        </style>

        <script>
            kendo.pdf.defineFont({
            "DejaVu Sans"             : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans.ttf",
            "DejaVu Sans|Bold"        : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Bold.ttf",
            "DejaVu Sans|Bold|Italic" : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
            "DejaVu Sans|Italic"      : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf"
        });
        </script>

        <!-- Load Pako ZLIB library to enable PDF compression -->
        <script src="../content/shared/js/pako.min.js"></script>

        <script>
            function getPDF(selector) {
        kendo.drawing.drawDOM($(selector)).then(function(group){
          kendo.drawing.pdf.saveAs(group, "Invoice.pdf");
        });
      }

    $(document).ready(function() {
        var data = [
          { productName: "QUESO CABRALES", unitPrice: 21, qty: 5 },
          { productName: "ALICE MUTTON", unitPrice: 39, qty: 7 },
          { productName: "GENEN SHOUYU", unitPrice: 15.50, qty: 3 },
          { productName: "CHARTREUSE VERTE", unitPrice: 18, qty: 1 },
          { productName: "MASCARPONE FABIOLI", unitPrice: 32, qty: 2 },
          { productName: "VALKOINEN SUKLAA", unitPrice: 16.25, qty: 3 }
        ];
        var schema = {
          model: {
            productName: { type: "string" },
            unitPrice: { type: "number", editable: false },
            qty: { type: "number" }
          },
          parse: function (data) {
                $.each(data, function(){
                    this.total = this.qty * this.unitPrice;
                });
                return data;
          }
        };
        var aggregate = [
          { field: "qty", aggregate: "sum" },
          { field: "total", aggregate: "sum" }
        ];
        var columns = [
          { field: "productName", title: "Product", footerTemplate: "Total"},
          { field: "unitPrice", title: "Price", width: 120},
          { field: "qty", title: "Pcs.", width: 120, aggregates: ["sum"], footerTemplate: "#=sum#" },
          { field: "total", title: "Total", width: 120, aggregates: ["sum"], footerTemplate: "#=sum#" }
        ];
        var grid = $("#grid").kendoGrid({
          editable: false,
          sortable: true,
          dataSource: {
            data: data,
            aggregate: aggregate,
            schema: schema,
          },
          columns: columns
        });

        $("#paper").kendoDropDownList({
          change: function() {
            $(".pdf-page")
              .removeClass("size-a4")
              .removeClass("size-letter")
              .removeClass("size-executive")
              .addClass(this.value());
          }
        });
    });
        </script>
        <style>
            table.customTable {
                margin-top: 10px;
                margin-bottom: 10px;
                width: 100%;
                background-color: #FFFFFF;
                border-collapse: collapse;
                border-width: 0px;
                border-color: #7EA8F8;
                border-style: solid;
                color: #000000;
            }

            table.customTable td {
                font-size: 16px;
            }

            ,
            table.customTable th {
                border-width: 0px;
                border-color: #7EA8F8;
                border-style: solid;
                padding: 5px;
            }

            table.customTable thead {
                background-color: #051b42;
            }

            .pdf-page {
                margin: 0 auto;
                box-sizing: border-box;
                box-shadow: 0 5px 10px 0 rgba(0, 0, 0, .3);
                background-color: #fff;
                color: #333;
                position: relative;
            }

            .row {
                position: absolute;
                top: .1in;
                height: .9in;
                left: .5in;
                right: .5in;
            }

            .column {
                float: left;

            }

            hr.new5 {
                border: 2px solid rgb(5, 5, 5);
                border-radius: 5px;
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            .text-center {
                text-align: center;

            }

            .left,
            .right {
                width: 25%;
            }

            .header-form {
                position: absolute;
                top: .5in;
                height: .9in;
                left: .5in;
                right: .5in;
                margin-top: 1.5in;
            }

            .header-form span {
                font-size: 14px;
                position: relative;
                font-size: 16px;
                font-weight: bold;
            }

            strong {
                font-size: 19px;
            }

            .header-form p {
                font-size: 14px;
                position: relative;
                font-weight: medium;
            }

            .text-header {
                font-size: 21px;
                font-weight: bold;
            }

            .text-body {
                font-size: 14px;
                font-weight: medium;
            }

            .text-footer {
                font-size: 12px;
                font-weight: medium;
            }

            .text-form {
                position: relative;
                font-size: 16px;
                font-weight: bold;
                top: 1.4in;
            }

            .middle {
                width: 50%;
            }

            .invoice-number {
                float: right;
            }

            .invoice-number1 {
                float: center;
            }

            .company-logo {
                font-size: 30px;
                font-weight: bold;
                color: #3aabf0;
            }

            .pdf-footer {
                position: absolute;
                bottom: .1in;
                height: .2in;
                left: .5in;
                right: .5in;
                padding-top: 15px;
                border-top: 2px solid #000000;
                text-align: left;
                color: #181818;
                font-size: 12px;
            }

            .pdf-body {
                position: absolute;
                top: 3.7in;
                bottom: 1.2in;
                left: .5in;
                right: .5in;
            }

            .size-a4 {
                width: 8.27in;
                height: 11.69in;
            }

            .size-letter {
                width: 8.27in;
                height: 13in;
            }

            .size-executive {
                width: 7.25in;
                height: 10.5in;
            }



            .for {
                position: absolute;
                top: 7.2in;
            }

            .from {
                position: absolute;
                top: 1.5in;
                right: .5in;
                width: 2.5in;
            }

            .from p,
            .for p {
                color: #787878;
            }

            .signature {
                padding-top: .5in;
            }
        </style>

    </div>


</body>