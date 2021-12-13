<!DOCTYPE html>
<html lang="et">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kontserdihaldussüsteem</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap-theme.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="../js/libs/jquery/dist/jquery.min.js" crossorigin="anonymous"></script>
    <script src="../js/libs/jquery/external/sizzle/dist/sizzle.min.js" crossorigin="anonymous"></script>
    <script src="../js/libs/jquery-ui/jquery-ui.min.js" crossorigin="anonymous"></script>
    <script src="../js/repeatable-fields/repeatable-fields.js"></script>
</head>

<body>
    <header id="header">

        <span><img src="./images/nurmoja_net_ee.png" alt=""></span>
        <span>Kontserdid ja nende kavad</span>
    </header>
    <div class="container-fluid">
        <form method="post">
            <div id="concert-title" class="row row-cols-5">
                <div class="col col-form-label-md-3">Nimi</div>
                <div class="col form-control-lg-8"><input type="text" class=" form-text" name="title"></div>
            </div>
            <div id="concert-description" class="row row-cols-5">
                <div class="col col-form-label-md-3">Tutvustus</div>
                <div class="col form-control-lg-8"><textarea name="description" class="form-plaintext"></textarea></div>
            </div>
            <div id="concert-description" class="row row-cols-5">
                <div class="col col-form-label-md-3">Sündmuse aeg ja koht</div>
                <div class="col form-control-lg-8">
                    <select class="form-select-sm name=" event">
                        <option>Vali sündmus</option>
                        <option value="1">Sündmus, millega kava ühendame</option>
                        <option value="2">Teine sündmus, millega me ei tegele</option>
                    </select>
                    <input id="concert_date" name="concert_date" type="date"> <input id="start_time" name="start_time"
                        type="time">
                </div>
            </div>
            <div id="concert-duration" class="row row-cols-5">
                <div class="col col-form-label-md-3">Kavandatav kestvus</div>
                <div class="form-control-lg-8"><input id="duration" name="duration" type="time"
                        pattern="[0-9]{2}:[0-9]{2}"></div>
            </div>

            <div class="repeat">
                <div class="wrapper" width="100%">

                    <div class="row row-cols-6">
                        <div><span class="add btn btn-success">Add</span>
                        </div>
                        <div class="col">Teos</div>
                        <div class="col">Esitajad</div>
                        <div class="col">Kestvus</div>
                        <div class="col">Kirjeldus</div>
                        <div class="col">Eemalda</div>
                    </div>
                    <div id="esitus" class="rows">
                        <div class="template row row-cols-6">
                            <div class="col">
                                <span class="move btn btn-sm btn-info">Move ↕</span>
                                <input type="hidden" id="esitus[{{row-count-placeholder}}][id]" />
                                <input type="hidden" id="esitus[{{row-count-placeholder}}][concert_id]" />

                                <input type="hidden" id="esitus[{{row-count-placeholder}}][jrk]"
                                    name="esitus[{{row-count-placeholder}}][jrk]" class="move-steps" value="1" />
                            </div>

                            <div class="col">
                                <input type="text" name="esitus[{{row-count-placeholder}}][teos]" />
                            </div>
                            <div class="col">
                                <input type="text" name="esitus[{{row-count-placeholder}}][esitajad]" />
                            </div>
                            <div class="col">
                                <input type="text" name="esitus[{{row-count-placeholder}}][teose_kestvus]" />
                                <input type="text" name="esitus[{{row-count-placeholder}}][lisakestvus]" />
                                <input type="text" name="esitus[{{row-count-placeholder}}][esituse_kestvus]" />
                            </div>
                            <div class="col" style="height:auto">
                                <textarea style="height:auto" name="esitus[{{row-count-placeholder}}][perfdesc]"
                                    placeholder="Vabas vormis tekst"></textarea>
                            </div>
                            <div class="col"><span class="remove btn btn-sm btn-danger">Remove</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Submit">
        </form>

        <script type="text/javascript">
        jQuery(function() {
            jQuery('.repeat').each(function() {
                jQuery(this).repeatable_fields({});
            });
        });
        </script>
        <?php 

        $newlist = [];
        if (!empty($_POST)) $newlist = array_values($_POST['esitus']);

        foreach ($newlist as $key => &$row)
        {
            $row['jrk'] = $key;
            var_dump($key);
        }

        foreach($_POST as $key => &$value)
        if ($key == 'esitus')
        {
            $value = $newlist;
        }

        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        echo 'Kas näen?';

        foreach ($newlist as $value)
        {
            print_r($value['jrk']);
        }

        ?>
    </div>
</body>

</html>