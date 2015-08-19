<?php
/**
 * User: dirg
 * Date: 07/08/2015
 * Time: 22:17
 */?>
@section('js')
    <script src="/engine/multiSelect/js/jquery.multi-select.js" type="text/javascript"></script>
    <script src="/engine/multiSelect/js/jquery.quicksearch.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('#permission').multiSelect({
            selectableHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='ketik...'>",
            selectionHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='ketik...'>",
            afterInit: function(ms){
                var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function(e){
                            if (e.which === 40){
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function(e){
                            if (e.which == 40){
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
            },
            afterSelect: function(){
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function(){
                this.qs1.cache();
                this.qs2.cache();
            }
        });
        $('#group').multiSelect({
            selectableHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='ketik...'>",
            selectionHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='ketik...'>",
            afterInit: function(ms){
                var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function(e){
                            if (e.which === 40){
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function(e){
                            if (e.which == 40){
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
            },
            afterSelect: function(){
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function(){
                this.qs1.cache();
                this.qs2.cache();
            }
        });

        $(document).ready(function(){
            $("#pass_cek").keyup(checkPasswordMatch);
            $("#pass_cek").focusout(checkPasswordMatch);
        });

        function checkPasswordMatch() {
            var password = $("#pass").val();
            var confirmPassword = $("#pass_cek").val();

            if (password != confirmPassword){
                $("#pass_warning").html("<div class='form-group has-error'><i class='fa fa-close'></i> Passwords tidak sama!</div>");
                $("#pass_div").className = 'form-group has-error';
                $("#pass_cek_div").className = 'form-group has-error';
            }else{
                $("#pass_warning").html("<div class='form-group has-success'><i class='fa fa-check'></i> Passwords sama.</div>");
                $("#pass_div").className = 'form-group has-success';
                $("#pass_cek_div").className = 'form-group has-success';
            }

        }
    </script>
@stop