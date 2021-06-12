<?php $count = 0; ?>
<div class="modal fade" id="{{ $id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <div class="modal-header">
                <h4 class="modal-title">{{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
              
                <table>
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th> Name</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($missing_files as $file)
                          <tr>
                              <td> {{ ++$count }} </td>
                              <td> {{$file}} </td>
                          </tr>
                         @endforeach
                   </tbody>
                </table>

            </div>

        </div>
    </div>
</div> 