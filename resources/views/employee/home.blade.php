<h1> <u> {{$globalTitle}} </u></h1>
<h3> Employee Home Page </h3>
<h5> {{$text}} </h5>


<h4> All Post Details </h4>      
 <div class="row py-3">
 <div class="col-sm-8 px-4"> 
 <table class="table table-border table-striped table-hover"> 
 <thead>
     <tr>
       <th scope="col">#</th>
       <th scope="col">Title</th>
       <th scope="col">Body</th>
       <th scope="col">Created-At</th>
       <th scope="col">Deleted-At</th>
       <th scope="col"> Action </th>
     </tr>
   </thead>
   <tbody> 
 @foreach ($posts as $post)
     <tr>
       <th scope="row">{{$post->id}}</th>

       <td>{{$post->title}}</td>
       <td>{{$post->body}}</td>
       <td>{{$post->created_at}}</td>
        <td>{{$post->deleted_at}}</td>
        <td> 
            <form action ="/post/sd/{{$post->id}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit">Soft Delete</button>
          </form>    
        </td>
        <td> 
            <form action ="/post/fd/{{$post->id}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit">Force Delete</button>
          </form>    
        </td>
      </tr>  
 @endforeach
 
 </table>
 </div> 

{{dd($posts)}}


