        <footer class="footer mt-auto py-3">
            <div class="container">
                <span class="text-muted">Place sticky footer content here.</span>
            </div>
        </footer>

        <!-- Modal para eventuais mensagens -->
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <script>
            $(document).ready(function() {
                if (!<?php if (isset($_SESSION['flash']) && !$_SESSION['flash']['success']) {
                            echo "false";
                        } else {
                            echo "true";
                        } ?>) {
                    //Abre modal de erro
                    alert("<?php if (isset($_SESSION['flash'])) echo $_SESSION['flash']['msg'] ?>");
                }
            });
        </script>


        <?php
        if (isset($_SESSION["flash"])) {
            foreach ($_SESSION["flash"] as $key => $value) {
                unset($_SESSION["flash"][$key]);
            }

            unset($_SESSION["flash"]);
        }
        ?>