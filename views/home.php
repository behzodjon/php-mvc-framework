<h1>Tasks</h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Task</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($tasks as $task): ?>
    <tr>
      <td> <?php echo  $task['username'];?></td>
      <td> <?php echo  $task['email'];?></td>
      <td> <?php echo  $task['task_text'];?></td>
      <td> <?php echo  $task['status'];?></td>
      <td><a href="/edit?id=<?=$task['id']?>">Edit</a> </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>

