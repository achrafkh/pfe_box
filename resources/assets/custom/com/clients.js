    $(document).ready(function() {
      $('#myTable').DataTable({
           columnDefs: [{
                "targets": 'no-sort',
                "orderable": false,
            }],
            order: [
                [7, 'desc']
            ],
            displayLength: 10,
            processing: true,
            serverSide: true,
            ajax: '/com/getclients',
            columns: [
                { 'data': 'src', render: function(data, type, full, meta)
                  {
                    if(data == 'fb')
                    {
                      return  '<i class="fa fa-facebook-official" aria-hidden="true"></i>';
                    } 
                    return '';
                  }
                },
                { 'data': 'id', 'name': 'id' },
                { 'data': 'name', 'name': 'name' },
                { 'data': 'email', 'name': 'email' },
                { 'data': 'phone', 'name': 'phone' },
                { 'data': 'address', 'name': 'address' },
                { 'data': 'city', 'name': 'city' },
                { 'data': 'created_at', 'name': 'created_at' },
                { 'data': 'id', render: function(data, type, full, meta)
                  {
                    return  '<a href="/com/client/'+data+'" class="btn btn-info waves-effect waves-light m-t-10">View</a>';
                  }}
            ]
        });
    });