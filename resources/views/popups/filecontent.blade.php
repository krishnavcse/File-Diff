<?php $count = 0; ?>
<div class="modal fade" id="{{ $id }}">
    <div class="modal-dialog modal-xl">
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
                            <th> File Content</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($dissimilar_file_contents as $file)
                          <tr>
                              <td> {{ ++$count }} </td>
                              <td> {{ $file['path'] }} </td>
                              <td> 
                                  @foreach($file['content'] as $key => $value)
                                    {{ $key . ' ' . $value }}
                                    <br/>
                                  @endforeach
                              </td>
                          </tr>
                         @endforeach
                   </tbody>
                </table>

            </div>

        </div>
    </div>
</div> 