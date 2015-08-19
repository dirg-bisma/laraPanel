<?php
/**
 * User: dirg
 * Date: 05/08/2015
 * Time: 23:56
 */?>
@section('js')
    <script src="/engine/multiSelect/js/jquery.multi-select.js" type="text/javascript"></script>
    <script src="/engine/multiSelect/js/jquery.quicksearch.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('#my-select').multiSelect({
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
    </script>
@stop