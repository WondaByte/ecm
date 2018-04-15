Actions.addUser = function(event){
    Dashboard.actionAjax("action/user", false, false, false, false);
}

Actions.deleteUser = function(event){
   Dashboard.initDelete(event, 'action/user');
}

Actions.updateUser = function(event){
   Dashboard.initUpdate(event, 'action/user');
}

Actions.addProduct = function(event){
  Dashboard.actionAjax('action/product', false, false, false, false);
}

Actions.deleteProduct = function(event){
  Dashboard.initDelete(event, 'action/product');
}

Actions.updateProduct = function(event){
   Dashboard.initUpdate(event, 'action/product');
}

Actions.addConstraints = function(event){
  Dashboard.actionAjax('action/constants', false, false, false, false);
}
Actions.addConstant = function(event){
  Dashboard.actionAjax('action/constants', false, false, false, false);
}
Actions.deleteConstant = function(event){
  Dashboard.initDelete(event, 'action/constants');
}
Actions.updateConstant = function(event){
   Dashboard.initUpdate(event, 'action/constants');
}
Actions.addBank = function(event){
  Dashboard.actionAjax('action/bank', false, false, false, false);
}
Actions.deleteBank = function(event){
  Dashboard.initDelete(event, 'action/bank');
}
Actions.updateBank = function(event){
   Dashboard.initUpdate(event, 'action/bank');
}
Actions.addBdc = function(event){
  Dashboard.actionAjax('action/bdc', false, false, false, false);
}
Actions.deleteBdc = function(event){
  Dashboard.initDelete(event, 'action/bdc');
}
Actions.updateBdc = function(event){
   Dashboard.initUpdate(event, 'action/bdc');
}
Actions.addDepot = function(event){
  Dashboard.actionAjax('action/depot', false, false, false, false);
}
Actions.deleteDepot = function(event){
  Dashboard.initDelete(event, 'action/depot');
}
Actions.updateDepot = function(event){
   Dashboard.initUpdate(event, 'action/depot');
}

