<?php

class QueryAnilist {
  public static $test = 'test';

  public static function test() {
    return json_encode([
      'query' => '
      query ($id: Int) { # Define which variables will be used in the query (id)
        Media (id: $id, type: ANIME) { # Insert our variables into the query arguments (id) (type: ANIME is hard-coded in the query)
          id
          title {
            romaji
            english
            native
          }
        }
      }
      ',
      'variables' => [
        "id" => 15125
      ]
    ]);
  }
}
