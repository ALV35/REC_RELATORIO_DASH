<?= $this->extend('layouts/form_layout') ?>

<?= $this->section('form') ?>
    <div class="container">
        <div class="row pt-3">
                <h4> <?= $title?> </h4>
                <hr>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form method="post" name="add_create" action="<?= base_url('store') ?>" id="add_create">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Value</label>
                        <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
            name="value" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select name="type" class="form-control">
                            <option value="input">Input</option>
                            <option value="output">Output</option>
                        </select>
                        <div class="form-group"><br>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

    <script>
        if($("#add_create").length > 0) {
            $("#add_create").validate({
                rules: {
                    description:{
                        required: true,
                    },
                    value: {
                        required: true,
                    },
                }
            })
        }
    </script>
    
<?= $this->endSection('form') ?>
