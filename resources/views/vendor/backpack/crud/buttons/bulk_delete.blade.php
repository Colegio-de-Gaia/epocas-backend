@if ($crud->hasAccess('bulkDelete') && $crud->get('list.bulkActions'))
	<a href="javascript:void(0)" onclick="bulkDeleteEntries(this)" class="btn btn-sm btn-secondary bulk-button"><i class="fa fa-trash"></i> {{ trans('backpack::crud.delete') }}</a>
@endif

@push('after_scripts')
<script>
	if (typeof bulkDeleteEntries != 'function') {
	  function bulkDeleteEntries(button) {

	      if (typeof crud.checkedItems === 'undefined' || crud.checkedItems.length == 0)
	      {
	      	new Noty({
	          type: "warning",
	          text: "<strong>{!! trans('backpack::crud.bulk_no_entries_selected_title') !!}</strong><br>{!! trans('backpack::crud.bulk_no_entries_selected_message') !!}"
	        }).show();

	      	return;
	      }

	      var message = ("{!! trans('backpack::crud.bulk_delete_are_you_sure') !!}").replace(":number", crud.checkedItems.length);
	      var button = $(this);

	      // show confirm message
	      swal({
			  title: "{!! trans('backpack::base.warning') !!}",
			  text: message,
			  icon: "warning",
			  buttons: {
			  	cancel: {
				  text: "{!! trans('backpack::crud.cancel') !!}",
				  value: null,
				  visible: true,
				  className: "bg-secondary",
				  closeModal: true,
				},
			  	delete: {
				  text: "{!! trans('backpack::crud.delete') !!}",
				  value: true,
				  visible: true,
				  className: "bg-danger",
				}
			  },
			}).then((value) => {
				if (value) {
					var ajax_calls = [];
					var delete_route = "{{ url($crud->route) }}/bulk-delete";

					// submit an AJAX delete call
					$.ajax({
						url: delete_route,
						type: 'POST',
						data: { entries: crud.checkedItems },
						success: function(result) {
						    // Show an alert with the result
							new Noty({
								type: "success",
								text: "<strong>{!! trans('backpack::crud.bulk_delete_sucess_title') !!}</strong><br>"+crud.checkedItems.length+"{!! trans('backpack::crud.bulk_delete_sucess_message') !!}"
							}).show();

						  	crud.checkedItems = [];
							  	crud.table.ajax.reload();
						},
						error: function(result) {
							// Show an alert with the result
							new Noty({
								type: "warning",
								text: "<strong>{!! trans('backpack::crud.bulk_delete_error_title') !!}</strong><br>{!! trans('backpack::crud.bulk_delete_error_message') !!}"
							}).show();
						}
					});
				}
			});
      }
	}
</script>
@endpush
