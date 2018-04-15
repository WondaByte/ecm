function sanitizeForm() {
	serverData = {};
	$('.modal').find('input').val('').end().find('.close').trigger('click');
}

function wait(func, time) {
	window.setTimeout(function () {
		func.call();
	}, time);
}

var bindClickEvents;
(bindClickEvents = function () {
	$('[data-action]').click(function (e) {
		var splited = $(this).data('action').split('.', 3);
		var action = splited[0],
			target = splited[1];

		console.log(action + upperCaseFirst(target));
		globals.lastClickedActionBtn = $(e.target);
		globals.lastVisitedURL = $(e.target).data('href') || globals.lastVisitedURL;

		Actions[action + upperCaseFirst(target)].call(Actions, e);
	});

 	$('.modal-trigger').leanModal();
    $('select').material_select();
})();

function serializeFormData(form, formData, ALLOW_EMPTY) {
	var obj = form || $('#edit-modal'),
		inputs = obj.find('input[name], select[name]'),
		serverData = (formData == 'formData') ? new FormData() : {},
		emptyFields = true;

	inputs.each(function (index) {
		if ($(this).attr('type') == 'file') {
			var name = $(this).attr('name');
			$.each($(this)[0].files, function (i, file) {
				if (serverData instanceof FormData) {
					serverData.append(name, file);
				} else {
					serverData[name] = file
				}
			});
		} 
		else if ($(this).val() != '' || ALLOW_EMPTY) {
			if (serverData instanceof FormData)
			{ 
				serverData.append($(this).attr('name'), $(this).val());
			}
			else {
				serverData[$(this).attr('name')] = $(this).val();
			}
			emptyFields = false;
		}

	});

	if (emptyFields) {
		Materialize.toast('Please fill out all the fields', 3000);
	}
	return serverData;
}

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

var globals = {};

var Dashboard = {
	initDelete: function (e, route) {
		var obj = $(e.target).closest('tr').find('.name');

		$('#delete-modal')
			.find('b.text-holder')
			.text(obj.text())
			.end()
			.find('.del')
			.click(function () {
				Dashboard.actionAjax(route, {
					id: obj.parents('li').data('id')
				}, function () {
				   $('#delete-modal').closeModal();
				}, 'DELETE');
			});
	},

	bindToMany: function (bindTo, e, obj) {
		var bindingTo = !bindTo ? $('#edit-modal') : bindTo,
			selector = 0,
			bindingFrom = $(e.target).parents('tr');

		SelectorObj = serializeFormData(false, false, true);
		SelectorArray = [];
		console.log(SelectorObj);

		for (name in SelectorObj) {
			console.log(name);
			SelectorArray.push(name);
		}
		while (selector < SelectorArray.length) {
			if (obj == 'input') {
				bindingTo.find('[name=' + SelectorArray[selector] + ']')
					.val(bindingFrom.find('.' + SelectorArray[selector]).text())
					.siblings('label')
					.addClass('active');

			} else {
				bindingTo.find(SelectorArray[selector]).text(bindingFrom.find(SelectorArray[selector]).text());
			}
			selector++;
		}
	},

	initUpdate: function (e, route) {
		Dashboard.bindToMany(false, e, 'input');

		$('.done-btn').unbind('click').click(function (evt) {
			var data = serializeFormData(),
				id = $(e.target).parents('tr').data('id');

			for (prop in data) {
				if (data[prop] == '') delete data[prop];
			}
			data.id = id;

			Dashboard.actionAjax(route, data, false, 'PUT');
		});
	},

	viewAjax: function (url, serverData, success) {
		$.ajax({
			url: url,
			type: 'get',
			data: serverData,
			success: function (data) {
				success.call({}, data);
			},
			error: function () {
				console.log('oops!');
			}
		});
	},

	actionAjax: function (url, data, successfn, type, multipart) {
		if (multipart === true) {
			$.ajax({
				url: url,
				type: 'post',
				contentType: false,
				processData: false,
				data: data || serializeFormData(false, 'formData'),
				success: function (response) {
					$('#edit-modal').closeModal();
					Materialize.toast(response.message, 3000, '', function () {
						reload();
					});
					successfn.call({}, response);
				}
			});
		} else {
			$.ajax({
				url: url,
				type: type || 'post',
				data: data || serializeFormData(),
				success: function (response) {
					if (!response.error && response.message) {
						$('#edit-modal').closeModal();
						sanitizeForm();

						Materialize.toast(response.message, 1000, '', function () {
							Dashboard.reload();
						});
					}
					else if(response.error)
					{
						Materialize.toast(response.message, 3000);
					}
					
					if (successfn) successfn.call({}, response);
				}
			});
		}
	},

	initCreate: function () {
		var url = $('.edit-modal').find('form').attr('action');
		this.actionAjax(url);
	},

	messageAfter: function (obj, message) {
		$("<p>", {
			text: message,
			class: 'message'
		}).insertAfter(obj);
		console.log(message);
	},

	renderResponse: function (response) {
		contents.html(response);
		var parts = globals.lastVisitedURL.split('/'),
			main = parts[parts.length - 2],
			sub = parts[parts.length - 1],
			currentView = '<i class="fa fa-home"></i> '+'Dashboard' + ' / '+ upperCaseFirst(main) + ' / ' + upperCaseFirst(sub);

		$('.link').html(currentView);

		$('select[name=rep]').change(function(){
			var rep = $(this).val(),
				url = 'reports',
				data = 'name='+rep;

			$.post(url, data, function(result){
				var tableBody = $('table#reports').find('tbody');

				tableBody.html(result.data);
				var temp = $('input[name=temp]').val(),
					density = $('input[name=density]').val();
					
				tableBody.find('td:nth-child(8n)').html(temp);
				tableBody.find('td:nth-child(9n)').html(density);

			});
		});

		bindClickEvents();
	},

	reload: function () {
		globals.lastClickedViewBtn.trigger('click');
		$('button.refresh').velocity('callout.flash');
	},

	notify: function (message, time, fn) {
		$('.notifications').find('message').text(message).end().addClass('show');

		wait(function () {
			$('.notifications').removeClass('show');
			fn.call({}, message);
		}, time);
	}
};

var contents = $('.contents'),
	Actions = {
		viewBtn: $('.view-btn'),
		getView: function (url) {
			globals.lastVisitedURL = url;

			Dashboard.viewAjax(url, {}, function(response){
				Dashboard.renderResponse(response);
			});
		}
	};


function upperCaseFirst(string) {
	var firstChar = string.charAt(0),
		newString = firstChar.toUpperCase() + string.slice(1);
	return newString;
}


$(document).ready(function () {

	Actions.viewBtn.click(function (e) {
		e.preventDefault();
		globals.lastClickedViewBtn = $(this);

		Actions.getView($(this).attr('href'));
	});

	$('button.refresh').click(function () {
		Dashboard.reload();
	});



	$('body').on('change', '#image', function (e) {
		console.log('selected');
		showPhoto(e.target, $('#preview'), $('#image_file'));
	});

});

function showPhoto(input, target, bytes) {
	var Reader = new FileReader();
	if (input.files && input.files[0]) Reader.readAsDataURL(input.files[0]);
	else console.log('files is empty');

	Reader.onloadend = function () {
		target.attr('src', Reader.result);
		bytes.attr('value', Reader.result);
	}
}

$(document).on('click', '.pagination a', function(e){
	e.preventDefault()
	var page = $(this).attr('href').split('page=')[1];
	var url  = $(this).attr('href').split('=')[0];
	getData(page, url);
});

function getData(page, url){
	$.ajax({
		url: url+'='+page
	})
	.done(function(data){
		$('.contents').html(data);
		location.hash = "";
	});

}
 