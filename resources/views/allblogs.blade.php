<table border="1px">  
<thead>  
<tr>  
<td>  
user </td>  

<td>  
ID </td>  
<td>  
Tile </td>  
<td>  
Description </td>  
<td>  
Banner image </td>  
<td>  
Body </td>  
</tr>  
</thead>  
<tbody>  
@foreach($cruds as $crud)  
        <tr border="none">  
            <td> {{ Auth::user()->name }}</td>
            <td>{{$crud->id}} </td>  
            <td>{{$crud->title}}</td>  
            <td>{{$crud->description}}</td>  
            <td><img src="./images/{{ $crud->bannerimage }}" style="width: 49px;"> </td>  
            <td>{{$crud->body}}</td>  
            <td><a href="/delete/{{$crud->id}}" class="btn btn-danger">delete</a></td>
			<td><a href="/edit/{{$crud->id}}" class="btn btn-success">edit</a></td>
         </tr>  
@endforeach  
</tbody>  
</table>  
