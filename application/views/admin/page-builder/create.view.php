<style>
    .tombolKustom {
        box-shadow: 3px 4px 0px 0px #00bfff;
        background: linear-gradient(to bottom, #000000 5%, #0066ff 100%);
        background-color: #000000;
        border-radius: 19px;
        border: 1px solid #000000;
        display: inline-block;
        cursor: pointer;
        color: #ffffff;
        font-family: Verdana;
        font-size: 17px;
        font-weight: bold;
        padding: 13px 76px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #000000;
    }

    .tombolKustom:hover {
        background: linear-gradient(to bottom, #0066ff 5%, #000000 100%);
        background-color: #0066ff;
    }

    .tombolKustom:active {
        position: relative;
        top: 1px;
    }
</style>
<form action="<?= URL_WEBSITE; ?>/admin/builder/store" enctype="multipart/form-data" method="post">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between mb-3">
            <a href="<?= URL_WEBSITE; ?>/admin/builder/batal" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Batal</a>
            <div>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                <a href="<?= URL_WEBSITE; ?>/admin/builder/preview" class="btn btn-info"><i class="fa fa-eye"></i> Preview</a>
            </div>
            <a href="<?= URL_WEBSITE; ?>/admin/builder" class="btn btn-primary">Selesai <i class="fa fa-check"></i></a>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="text_header" class="form-label">Text Header</label>
                <input type="text" name="text_header" class="form-control" id="text_header" placeholder="Text Header">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input class="form-control" type="file" name="gambar1" id="gambar">
            </div>
            <div class="mb-3">
                <label for="gambar_url1" class="form-label">Gambar Url 1</label>
                <input type="text" name="gambar_url1" class="form-control" id="gambar_url1" placeholder="https://imgur.com/xxxxxxxx.jpg">
                <small>Isi Salah satu Sumber gambar</small>
            </div>
            <div class="mb-3">
                <label for="text_body" class="form-label">Text Body</label>
                <textarea name="text_body" class="richText" id="text_body"><p>Click on <strong>"ENTER HERE"</strong> to continue to the next step</p></textarea>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <label for="btn_name" class="form-label">Button Name</label>
                        <input type="text" name="btn_name" class="form-control" id="btn_name" placeholder="Button Name" value="ENTER HERE!">
                    </div>
                    <div class="col-md-3">
                        <label for="btn_class" class="form-label">Button Class</label>
                        <input type="text" name="btn_class" class="form-control" id="btn_class" placeholder="Button Class" value="tombolKustom">
                    </div>
                    <div class="col-md-6">
                        <label for="btn_type" class="form-label">Button Type</label>
                        <select name="btn_type" id="btn_type" class="form-control" required>
                            <option value="">PILIH TYPE</option>
                            <option value="a">&lt;a href="" &gt;&lt;/a&gt;</option>
                            <option value="btn" selected>&lt;button type="" &gt;&lt;/button&gt;</option>
                        </select>
                    </div>
                    <div class="col-md-3 btn_type_selected">
                        <label for="btn_onclick" class="form-label">Button Onclick</label>
                        <input type="text" name="btn_onclick" class="form-control" id="btn_onclick" placeholder="Button Onclick" value="_tx()">
                    </div>
                    <div class="col-md-9 btn_type_selected">
                        <p class="pt-4"><small>isi jika pilih button type nya &lt;button type="" &gt;&lt;/button&gt;</small></p>
                    </div>
                    <div class="col-md-3 a_href_type_selected">
                        <label for="btn_target" class="form-label">Button Target </label>
                        <input type="text" name="btn_target" class="form-control" id="btn_target" placeholder="Button Target" value="_blank">
                    </div>
                    <div class="col-md-9 a_href_type_selected">
                        <label for="btn_link" class="form-label">Button Link</label>
                        <input type="text" name="btn_link" class="form-control" id="btn_link" placeholder="Button Link" value="">
                        <small>isi jika pilih button type nya &lt;a href="" &gt;&lt;/a&gt;</small>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="pilih_tipe_upload_gambar" class="form-label">Pilih Sumber Gambar</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sumber_gambar" id="sumber_upload" value="upload">
                            <label class="form-check-label" for="sumber_upload">Upload</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sumber_gambar" id="sumber_url" value="url">
                            <label class="form-check-label" for="sumber_url">Url</label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3 sumber_type_upload">
                            <label for="gambarFoter" class="form-label">Gambar Footer</label>
                            <input class="form-control" type="file" name="gambar2" id="gambarFoter">
                        </div>
                        <div class="mb-3 sumber_type_url">
                            <label for="gambar_url2" class="form-label">Gambar Url Footer</label>
                            <input type="text" name="gambar_url2" class="form-control" id="gambar_url2" placeholder="https://imgur.com/xxxxxxxx.jpg">
                        </div>
                    </div>
                </div>

            </div>
            <div class="mb-3">
                <label for="text_footer" class="form-label">Text Footer</label>
                <input type="text" name="text_footer" class="form-control" id="text_footer" placeholder="Text Footer" value="Copyright © 2023 | Footer.">
            </div>
            <div class="mb-3">
                <label for="custom_css" class="form-label">Kustom CSS</label> <button type="button" class="btn btn-sm btn-primary float-end" id="btn_hide_kustom_css">Hide</button>
                <textarea name="custom_css" class="richText" id="custom_css">
            .tombolKustom {
                box-shadow: 3px 4px 0px 0px #00bfff;
                background: linear-gradient(to bottom, #000000 5%, #0066ff 100%);
                background-color: #000000;
                border-radius: 19px;
                border: 1px solid #000000;
                display: inline-block;
                cursor: pointer;
                color: #ffffff;
                font-family: Verdana;
                font-size: 17px;
                font-weight: bold;
                padding: 13px 76px;
                text-decoration: none;
                text-shadow: 0px 1px 0px #000000;
            }

            .tombolKustom:hover {
                background: linear-gradient(to bottom, #0066ff 5%, #000000 100%);
                background-color: #0066ff;
            }

            .tombolKustom:active {
                position: relative;
                top: 1px;
            }
                
            </textarea>
            </div>
            <div class="mb-3">
                <label for="script_locker" class="form-label">Script Locker</label> <button type="button" class="btn btn-sm btn-primary float-end" id="btn_hide_script_locker">Hide</button>
                <textarea name="script_locker" class="richText" id="script_locker">
            <script type="text/javascript">
        var oDajn_mzp_uWDnuc = {
            "it": 4178726,
            "key": "9f193"
        };
    </script>
    <script src="https://d368ol0wkasvru.cloudfront.net/d602204.js"></script>
            </textarea>
            </div>
        </div>
        <div class="col-md-6">
            <h2>PREVIEW:</h2>
            <div class="row text-center">
                <div class="col-md-12">
                    <h4>Text Header</h4>
                    <img class="img-thumbnail" src="<?= BASE_PATH; ?>/public/img/300x250.jpg" alt="">
                </div>
                <div class="col-md-12 mb-2">
                    <p>Click on <strong>"ENTER HERE"</strong> to continue to the next step</p>
                    <button class="tombolKustom">ENTER HERE!</button><br>
                </div>
                <div class="col-md-12 mb-2">
                    <img class="img-fluid mt-1" src="<?= BASE_PATH; ?>/public/img/meta.gif" alt="">
                </div>
                <div class="col-md-12">
                    <div class="fotter__offer">Copyright © 2023 | Footer.</div>
                </div>
            </div>
            <!-- //render style Preview -->

            <!-- //render script Preview -->
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        var selected = $('#btn_type').val();
        select_selected(selected);

    })
    $('#btn_type').on('change', function(e) {
        var selected = $(this).val();
        select_selected(selected);
    })

    $('input[type=radio][name=sumber_gambar]').on('change', function() {
        switch ($(this).val()) {
            case 'upload':
                $('.sumber_type_url').hide(2000);
                $('.sumber_type_upload').show(2000);
                break;
            case 'url':
                $('.sumber_type_url').show(2000);
                $('.sumber_type_upload').hide(2000);
                break;
        }
    });

    function select_selected(selected) {
        if (selected != '') {
            if (selected == 'a') {
                $('.btn_type_selected').hide(2000);
                $('.a_href_type_selected').show(2000);
            } else if (selected == 'btn') {
                $('.btn_type_selected').show(2000);
                $('.a_href_type_selected').hide(2000);
            }
        } else {
            $('.btn_type_selected').hide(2000);
            $('.a_href_type_selected').hide(2000);
        }
    }

    $('#text_body').richText({
        fontList: ["Arial",
            "Arial Black",
            "Comic Sans MS",
            "Courier New",
            "Geneva",
            "Georgia",
            "Helvetica",
            "Impact",
            "Lucida Console",
            "Tahoma",
            "Times New Roman",
            "Verdana"
        ],

        imageUpload: false,
        fileUpload: false,

        table: false,
        videoEmbed: false,

        height: 120,
    });

    $('#custom_css').richText({
        // text formatting
        bold: false,
        italic: false,
        underline: false,

        // text alignment
        leftAlign: false,
        centerAlign: false,
        rightAlign: false,
        justify: false,

        // lists
        ol: false,
        ul: false,

        // title
        heading: false,

        // fonts
        fonts: false,
        fontColor: false,
        backgroundColor: false,
        fontSize: false,

        imageUpload: false,
        fileUpload: false,
        urls: false,
        removeStyles: false,

        table: false,
        videoEmbed: false,

        height: 320,
    });

    $('#script_locker').richText({
        // text formatting
        bold: false,
        italic: false,
        underline: false,

        // text alignment
        leftAlign: false,
        centerAlign: false,
        rightAlign: false,
        justify: false,

        // lists
        ol: false,
        ul: false,

        // title
        heading: false,

        // fonts
        fonts: false,
        fontColor: false,
        backgroundColor: false,
        fontSize: false,

        imageUpload: false,
        fileUpload: false,
        urls: false,
        removeStyles: false,

        table: false,
        videoEmbed: false,

        height: 320,
    });
</script>