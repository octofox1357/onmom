<?php
namespace Project\Controllers;

class Board {
    private $boardTable;
    private $authentication;

    public function __construct($boardTable, $authentication){
        $this->boardTable = $boardTable;
        $this->authentication = $authentication;

    }
    public function writePostPage(){
        if (isset($_GET['post_id'])) {
			$post = $this->boardTable->findById($_GET['post_id']);
		}

        return ['template' => 'post_write.html.php',
            'variables' => [
                'post' => $post ?? null,
            ]
        ];
    }
    public function saveEdit(){
        $user = $this->authentication->getUser();
        $post = $_POST['post'];
        $user->writePost($post);

        header('location: /post/list?board_id='.$_POST['board_id']);
    }

    public function listPage(){
        $page = $_GET['page'] ?? 1;
		$offset = ($page-1)*15;

		return ['template' => 'post_list.html.php',
			'variables' => [
				'post_list' => $this->boardTable->findAll('reg_time DESC', 15, $offset),
				'current_page' => $page
			],
		];
    }

    public function readPage(){

        $post = $this->boardTable->findById($_GET['post_id']);
        return ['template' => 'post_read.html.php',
        'variables' => [
            'post' => $post,
        ],
    ];
    }

}