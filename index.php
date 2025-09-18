<?php
// Dashboard frontend
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Blog Dashboard</title>
  <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<style>
  /* Small tweak for table on mobile */
  .table-responsive { overflow-x: auto; }
</style>

</head>
<body class="bg-dark text-light" data-bs-theme="dark">

<div class="container mt-4">
  <h2 class="mb-4">Blog Dashboard</h2>

  <!-- Alerts -->
  <div id="alert-container"></div>

  <!-- Create Post Form -->
  <div class="card mb-4">
    <div class="card-header">Create Post</div>
    <div class="card-body">
      <form id="postForm">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          <small>(minimum of 100 characters)</small>
          <textarea id="body" name="body" class="form-control" rows="3"></textarea>
          <small id="bodyCounter" class="text-danger">0 / 100 characters</small>
        </div>
        <button type="submit" class="btn btn-primary">Add Post</button>
      </form>
    </div>
  </div>
  
  <!-- Search + Sort -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <input type="text" id="searchInput" class="form-control w-50" placeholder="Search by title...">
    <select id="sortSelect" class="form-select w-auto ms-2">
      <option value="newest">Newest First</option>
      <option value="oldest">Oldest First</option>
    </select>
  </div>

  <!-- Posts Table -->
  <div class="card">
    <div class="card-header">Posts</div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="postsTableBody"></tbody>
      </table>
    </div>
  </div>
</div>

<script src="blog.js">
// $(document).ready(function() {
//     const API_URL = "api.php";
//     let allPosts = []; //store all posts in memory

//     //Show Alert
//     function showAlert(type, message) {
//         const alertHtml = `
//           <div class="alert alert-${type} alert-dismissible fade show" role="alert">
//             ${message}
//             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
//           </div>`;
//         $("#alert-container").html(alertHtml);
//     }

//     //Render Posts (with search + sort)
//     function renderPosts() {
//         const searchTerm = $("#searchInput").val().toLowerCase();
//         const sortOrder = $("#sortSelect").val();

//         let filtered = allPosts.filter(post =>
//             post.title.toLowerCase().includes(searchTerm)
//         );

//         //Sort by created_at
//         filtered.sort((a, b) => {
//             if (sortOrder === "newest") {
//                 return new Date(b.created_at) - new Date(a.created_at);
//             } else {
//                 return new Date(a.created_at) - new Date(b.created_at);
//             }
//         });

//         //Build table rows
//         let rows = "";
//         filtered.forEach(post => {
//             rows += `
//               <tr>
//                 <td>${post.id}</td>
//                 <td>${post.title}</td>
//                 <td class="text-wrap" style="max-width:250px; word-wrap:break-word; white-space:normal;">
//                   ${post.body}
//                 </td>
//                 <td>${post.created_at}</td>
//                 <td>
//                   <button class="btn btn-danger btn-sm delete-btn" data-id="${post.id}">Delete</button>
//                 </td>
//               </tr>`;
//         });

//         $("#postsTableBody").html(rows);
//     }

//     //Load Posts
//     function loadPosts() {
//         $.get(API_URL + "/posts", function(data) {
//             allPosts = data;
//             renderPosts();
//         }).fail(function() {
//             showAlert("danger", "Failed to load posts.");
//         });
//     }

//     //Invoke function initially to load posts
//     loadPosts();

//     //Create Post (AJAX)
//     $("#postForm").submit(function(e) {
//         e.preventDefault();
        
//         const postData = {
//             title: $("#title").val(),
//             body: $("#body").val()
//         };      

//         $.ajax({
//             url: API_URL + "/posts",
//             method: "POST",
//             contentType: "application/json",
//             data: JSON.stringify(postData),
//             success: function(res) {
//                 showAlert("success", res.message);
//                 $("#postForm")[0].reset();
//                 $("#bodyCounter")
//                   .text("0 / 100 characters")
//                   .removeClass("text-success")
//                   .addClass("text-danger");
//                 loadPosts();
                
//             },
//             error: function(xhr) {
//                 const errorMsg = xhr.responseJSON?.error || "Failed to create post.";
//                 showAlert("danger", errorMsg);
//             }
//         });
//     });

//     // Live character counter for Body
//     $("#body").on("input", function() {
//         const len = $(this).val().length;
//         const minChars = 100;
//         $("#bodyCounter").text(len + " / " + minChars + " characters");

//         if (len < minChars) {
//             $("#bodyCounter").addClass("text-danger");
//         } else {
//             $("#bodyCounter").removeClass("text-danger").addClass("text-success");
//         }
//     });

//     //Delete Post (AJAX with confirmation)
//     $(document).on("click", ".delete-btn", function() {
//         const id = $(this).data("id");
//         if (!confirm("Are you sure you want to delete this post?")) return;

//         $.ajax({
//             url: API_URL + "/posts/" + id,
//             method: "DELETE",
//             success: function(res) {
//                 showAlert("success", res.message);
//                 loadPosts();
//             },
//             error: function(xhr) {
//                 const errorMsg = xhr.responseJSON?.error || "Failed to delete post.";
//                 showAlert("danger", errorMsg);
//             }
//         });
//     });

//     //Realtime search and sorting
//     $("#searchInput").on("keyup", renderPosts);
//     $("#sortSelect").on("change", renderPosts);
// });
</script>
</body>
</html>
