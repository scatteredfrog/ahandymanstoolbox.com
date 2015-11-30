/* global angular */

var app = angular.module('editForm',[]);

app.controller('formEdit', function($scope,$http) {
    $scope.showPublic = false;
    $scope.showPrivate = false;
    $scope.lastTool = null;
    
    $scope.toggleActive = function(tool_id, is_active) {
        $http.post('toggleActiveTool', { 'tool_id' : tool_id}).then(
            function successCallback(response) {
                var tool = '#tool' + tool_id + ' .activity';
                var ttext = angular.element(tool).text();
                angular.element(tool).toggleClass('activeTool').toggleClass('inactiveTool');
                ttext = ttext === 'Activate' ? 'Deactivate' : 'Activate';
                angular.element(tool).text(ttext);
            },
            function errorCallback(response) {
                alert("There was a problem; database couldn't be updated.");
            });
    };
    
    $scope.populateAngular = function(tool_data) {
        $scope.id = tool_data.id;
        $scope.name = tool_data.name;
        $scope.stock = tool_data.stock;
        $scope.public_notes = tool_data.public_notes;
        $scope.public_misc = tool_data.public_misc;
        $scope.private_notes = tool_data.private_notes;
        $scope.private_misc = tool_data.private_misc;
        $scope.category = tool_data.category;
        $scope.display_info = tool_data.display_info ? 'y' : 'n';
        $scope.purchased_from = tool_data.purchased_from;
        $scope.purchase_price = tool_data.purchase_price;
        $scope.purchase_date = tool_data.purchase_date;
        $scope.purchase_year = $scope.purchase_date.substr(0,4);
        $scope.purchase_month = $scope.purchase_date.substr(5,2);
        $scope.purchase_day = $scope.purchase_date.substr(8);
        $scope.craigslist_title = tool_data.craigslist_title;
        $scope.ebay_title = tool_data.ebay_title;
        var dateSold = tool_data.date_sold.split('/');
        $scope.sold_date_month = dateSold[0];
        $scope.sold_date = dateSold[1];
        $scope.sold_year = dateSold[2];
        $scope.sold_to_name = tool_data.sold_to_name;
        $scope.sold_to_phone = tool_data.sold_to_phone;
        $scope.sold_to_email = tool_data.sold_to_email;
        $scope.sold_via = tool_data.sold_by;
        $scope.sale_price = tool_data.sale_price;
        $scope.commission = tool_data.commission;
        $scope.shipping = tool_data.shipping;
        $scope.other_costs = tool_data.other_costs;
        $scope.profit_loss = tool_data.profit_loss;
        $scope.action_needed = tool_data.action_needed;
        $scope.notes_for_sean = tool_data.notes_for_sean;
        $scope.buyers_premium = tool_data.buyers_premium;
        $scope.price_tag = tool_data.price_tag;
        
        console.dir(tool_data);

        $scope.isCatChecked = function(cat) {
            if ($scope.category !== null) {
                var catArray = $scope.category.split(',');
                var xlen = catArray.length;
                for (x = 0; x < xlen; x++) {
                    if (catArray[x] == cat) {
                        return true;
                    }
                }
                return false;
            }
            return false;
        };
        angular.element('#edit_purchase_date').datepick({
            'defaultDate' : '-lw',
            'selectDefaultDate' : true,
            'dateFormat' : 'yyyy-mm-dd'
        });
    };

    $scope.toggleButton = function(which_button) {
        if (which_button === 'public') {
            $scope.showPublic = $scope.showPublic ? false : true;
        } else if (which_button === 'private') {
            $scope.showPrivate = $scope.showPrivate ? false : true;
        }
    };        

    $scope.lastToolClicked = function(tool_id) {
        $scope.lastTool = tool_id;
    };
    
    $scope.deleteTool = function() {
        $http.post('deleteTool', { 'tool_id' : $scope.lastTool }).then(
            function successCallback(response) {
                location.reload();
            },
            function errorCallback(response) {
                alert("There was a problem; database couldn't be updated.");
            }
        );
        angular.element('#edit_tool_warning').modal('hide');
    };

    $scope.dateClick = function() {
        angular.element('.datepick-popup').addClass('datepick-popup-ed');
        angular.element('.datepick-popup-ed').removeAttr('style');
        angular.element('.datepick-popup-ed').removeClass('datepick-popup');
        angular.element('.datepick-popup-ed').addClass('datepick');
    };
    
    $scope.closeTool = function() {
        $scope.showPrivate = false;
        $scope.showPublic = false;
        angular.element('#edit_a_tool').modal('hide');
    };
    
    $scope.updateTool = function() {
        var numberOfCategories = angular.element('[id^="cat"]').length;
        var categories_to_submit = '';
        var cat_id = '';
        var sold_date = $scope.sold_date_month + '/' + $scope.sold_date + '/' + $scope.sold_year;
        if ($scope.purchase_day.length === 1) {
            $scope.purchase_day = '0' + $scope.purchase_day;
        }
        $scope.purchase_date = $scope.purchase_year + '-' + $scope.purchase_month + '-' + $scope.purchase_day;
        angular.element('[id^="cat"]').each(function() {
            cat_id = angular.element(this).attr('id');
            if (angular.element(this).prop('checked')) {
                categories_to_submit += (cat_id.substr(3) + ',');
            }
        });
        categories_to_submit = categories_to_submit.substr(0, categories_to_submit.length-1);
        $scope.display_info = $scope.display_info == 'y' ? 1 : 0;
        var post_data = {
            'id' : $scope.id,
            'name' : $scope.name, 'stock' : $scope.stock,
            'category' : categories_to_submit,
            'craigslist_title' : $scope.craigslist_title, 'ebay_title' : $scope.ebay_title,
            'purchase_date' : $scope.purchase_date, 'purchase_price' : $scope.purchase_price,
            'buyers_premium' : $scope.buyers_premium, 'purchased_from' : $scope.purchased_from,
            'display_info' : $scope.display_info, 'price_tag' : $scope.price_tag,
            'public_notes' : $scope.public_notes, 'public_misc' : $scope.public_misc,
            'sale_price' : $scope.sale_price, 'date_sold' : sold_date,
            'sold_to_name' : $scope.sold_to_name, 'sold_to_phone' : $scope.sold_to_phone,
            'sold_to_email' : $scope.sold_to_email, 'sold_by' : $scope.sold_via,
            'commission' : $scope.commission, 'shipping' : $scope.shipping,
            'other_costs' : $scope.other_costs, 'profit_loss' : $scope.profit_loss,
            'private_notes' : $scope.private_notes, 'private_misc' :  $scope.private_misc,
            'action_needed' : $scope.action_needed, 'notes_for_sean' : $scope.notes_for_sean
        };
        
        $http.post('editTool', post_data).then(
            function successCallback(response) {
                $scope.closeTool();
                alert("Thank you. Info saved.");
                location.reload();
            },
            function errorCallback(response) {
                alert("There was a problem; database couldn't be updated.");
            }
        );
    };
});
