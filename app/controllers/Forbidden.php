<?php 

class Forbidden extends Controller 
{
  public function index()
  {
    echo 
        "<h1>Forbidden</h1>
        <p>You don't have permission to access this page.</p>";
  }
}
