<?php
header("Content-Type: application/json");
require_once "connect.php";
require_once "post.php";

//Create PDO Instance
$post = new Post($pdo);

$method = $_SERVER["REQUEST_METHOD"];
$uri = $_SERVER["REQUEST_URI"]; 
$uri = explode("?", $uri)[0]; // remove query params
$uri = str_replace("/blog/backend/api.php", "", $uri); // remove prefix to redefine routing

//Uses try/catch for error handling
try {
    if ($method === "GET" && $uri === "/posts") {
        echo json_encode($post->getAll());

    } elseif ($method === "POST" && $uri === "/posts") {
        //json_decode in order to read body json format
        $data = json_decode(file_get_contents("php://input"), true);
        if (!$data || !isset($data["title"]) || !isset($data["body"])) {
            throw new Exception("Invalid input");
        }

        $id = $post->create($data["title"], $data["body"]);
        echo json_encode(["message" => "Post created", "id" => $id]);

    } elseif ($method === "DELETE" && preg_match("#^/posts/(\d+)$#", $uri, $matches)) {
        //Use preg_match to make sure it only gets a number
        $id = $matches[1];
        $post->delete($id);
        echo json_encode(["message" => "Post deleted"]);

    } else {
        http_response_code(404);
        echo json_encode(["error" => "404 Not Found"]);
    }
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(["error" => $e->getMessage()]);
}
