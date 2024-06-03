<?php
// series
$get_player = `{
  "id": 1,
  "jsonrpc": "2.0",
  "result": [
    {
      "playerid": 1,
      "playertype": "internal",
      "type": "video"
    }
  ]
}`;
$get_item_series = `{
  "id": 1,
  "jsonrpc": "2.0",
  "result": {
    "item": {
      "album": "",
      "art": {
        "banner": "image://https%3a%2f%2fthetvdb.com%2fbanners%2fgraphical%2f80379-g23.jpg/",
        "clearart": "image://http%3a%2f%2fassets.fanart.tv%2ffanart%2ftv%2f80379%2fhdclearart%2fthe-big-bang-theory-519818ab2d8a9.png/",
        "clearlogo": "image://http%3a%2f%2fassets.fanart.tv%2ffanart%2ftv%2f80379%2fhdtvlogo%2fthe-big-bang-theory-50477a642f672.png/",
        "fanart": "image://https%3a%2f%2fimage.tmdb.org%2ft%2fp%2foriginal%2f%2f8Ayyn5aUTiWyFe4NpWIlMNloJnk.jpg/",
        "icon": "image://DefaultVideo.png/",
        "poster": "image://https%3a%2f%2fimage.tmdb.org%2ft%2fp%2foriginal%2f%2f69ZoX1r1JSKB5JHc1eAabLE0vFU.jpg/",
        "thumb": "image://http%3a%2f%2fassets.fanart.tv%2ffanart%2ftv%2f80379%2fseasonthumb%2fthe-big-bang-theory-4fd216c6046dd.jpg/"
      },
      "artist": [
        
      ],
      "cast": [
        {
          "name": "Jim Parsons",
          "order": 0,
          "role": "Sheldon Cooper"
        },
        {
          "name": "Johnny Galecki",
          "order": 1,
          "role": "Leonard Hofstadter"
        },
        {
          "name": "Kaley Cuoco",
          "order": 2,
          "role": "Penny"
        },
        {
          "name": "Simon Helberg",
          "order": 3,
          "role": "Howard Wolowitz"
        },
        {
          "name": "Kunal Nayyar",
          "order": 4,
          "role": "Rajesh Koothrappali"
        },
        {
          "name": "Melissa Rauch",
          "order": 5,
          "role": "Bernadette Rostenkowski"
        },
        {
          "name": "Mayim Bialik",
          "order": 6,
          "role": "Amy Farrah Fowler"
        },
        {
          "name": "Kevin Sussman",
          "order": 7,
          "role": ""
        },
        {
          "name": "Carol Ann Susi",
          "order": 8,
          "role": ""
        },
        {
          "name": "Pasha D. Lychnikoff",
          "order": 9,
          "role": ""
        }
      ],
      "country": [
        "US"
      ],
      "customproperties": {
        "AudioChannels.1": 6,
        "AudioCodec.1": "DTS",
        "AudioLanguage.1": "en",
        "contextmenuaction(0)": "RunPlugin(plugin://plugin.video.stream-cinema-2-release/command/?command=trakt-media-menu&id=75480&media_type=episode&title=Variabilita+ve%C4%8Dera+ve+dvou)",
        "contextmenuaction(1)": "RunPlugin(plugin://plugin.video.stream-cinema-2-release/command/?command=trakt_mark_as_watched&trakt_id=75480&media_type=episode)",
        "contextmenulabel(0)": "Trakt.tv Menu",
        "contextmenulabel(1)": "[COLOR lightskyblue]Trakt[/COLOR] Mark as watched",
        "isplayable": "true",
        "libraryartfilled": true,
        "original_listitem_url": "plugin://plugin.video.stream-cinema-2-release/resolve_media_item/?media_id=5edcdf08ed097169ab04a6ad"
      },
      "dateadded": "2020-06-07 00:00:00",
      "director": [
        "Mark Cendrowski"
      ],
      "dynpath": "http://vip.17.dl.wsfiles.cz/8239/dNfuRufdTO/524288000/eJw1TslKxEAQ_Zc6eGqSqnR6hcGLgjiQEcflEpBOLxhQo51FGPHfbQWPb39f4MACoak0VUSikhwYjGCRwQKWFClJjeSSwVYggxWsFlw0DOY__A52yWtk8FZ6bvbXfGiai_bh46iutqO8pNIWisJV8ITSGeHRO0E0OBRKGYxp0ChS1NybVuOvvezCNoY4Pc1Lju61cLlQn3GYn12OlT_1dRpfYl+HLq23awp3h74+jzlPeXff7bvDY3c27Upsyf_v5lN5qwUaJVvz_QME1kN1/895bc461961f64c125446d3233a6b7df340ad91d/PKJ3b22D4VqS7HvS6E1",
      "episode": 1,
      "episodeguide": "",
      "fanart": "image://https%3a%2f%2fimage.tmdb.org%2ft%2fp%2foriginal%2f%2f8Ayyn5aUTiWyFe4NpWIlMNloJnk.jpg/",
      "file": "http://vip.17.dl.wsfiles.cz/8239/dNfuRufdTO/524288000/eJw1TslKxEAQ_Zc6eGqSqnR6hcGLgjiQEcflEpBOLxhQo51FGPHfbQWPb39f4MACoak0VUSikhwYjGCRwQKWFClJjeSSwVYggxWsFlw0DOY__A52yWtk8FZ6bvbXfGiai_bh46iutqO8pNIWisJV8ITSGeHRO0E0OBRKGYxp0ChS1NybVuOvvezCNoY4Pc1Lju61cLlQn3GYn12OlT_1dRpfYl+HLq23awp3h74+jzlPeXff7bvDY3c27Upsyf_v5lN5qwUaJVvz_QME1kN1/895bc461961f64c125446d3233a6b7df340ad91d/PKJ3b22D4VqS7HvS6E1",
      "firstaired": "2012-09-27",
      "genre": [
        "Comedy",
        "Romance"
      ],
      "imdbnumber": "",
      "label": "Variabilita večera ve dvou",
      "lastplayed": "",
      "mediapath": "plugin://plugin.video.stream-cinema-2-release/resolve_media_item/?media_id=5edcdf08ed097169ab04a6ad",
      "mpaa": "",
      "originaltitle": "The Date Night Variable",
      "playcount": 0,
      "plot": "Howard je ve vesmíru a ani tam si nemůže na chvilku oddychnout od své matky. Amy a Sheldon slaví výročí, ale to neprobíhá podle Amyiných představ. Vztah Penny a Leonarda je stále divný a Raj se bez Howarda cítí osamělý. Když mu Sheldon nabídne, aby šel s ním a s Amy na výroční večeři, je nadšený. Sheldon se tím chce vyhnout konverzaci s Amy a myslí si, že Raj ji za něho obstará. Jenže naštvaná Amy Raje vyhodí a on jde otravovat Penny a Leonarda, což Penny vítá, protože se nechce bavit o tom, v jakém stavu je teď jejich vztah. Raj to začne řešit a je šokován, že Penny nikdy Leonardovi neřekla, že ho miluje, a tak je opět vykopnut. Nakonec skončí ve Stuartově obchodě a dohodnou se, že by spolu někdy mohli někam vyrazit. Sheldonovi se mezitím podaří usmířit si Amy nacvičeným romantickým proslovem ze Spidermana.\n\nHoward musí řešit spor mezi Bernadette a jeho matkou. Ta se od Bernadette dozvěděla, že se od ní chtějí odstěhovat. Bernie je rozčílená, protože si myslela, že už to matce oznámil. Nakonec se Howard uchýlí ke lži, matce slíbí, že Bernadette přesvědčí, aby zůstali bydlet u ní a své ženě namluví, že matce vysvětlil, že se odstěhují.",
      "plotoutline": "",
      "premiered": "2012-09-27",
      "productioncode": "",
      "rating": 7.900000095367432,
      "resume": {
        "position": 0.0,
        "total": 0.0
      },
      "runtime": 1271,
      "season": 6,
      "set": "",
      "setid": -1,
      "showlink": [
        
      ],
      "showtitle": "The Big Bang Theory",
      "sorttitle": "Variabilita večera ve dvou",
      "specialsortepisode": -1,
      "specialsortseason": -1,
      "streamdetails": {
        "audio": [
          {
            "channels": 6,
            "codec": "DTS",
            "language": "en"
          }
        ],
        "subtitle": [
          
        ],
        "video": [
          {
            "aspect": 1.7799999713897706,
            "codec": "H264",
            "duration": 1271,
            "height": 1080,
            "language": "",
            "stereomode": "",
            "width": 1920
          }
        ]
      },
      "studio": [
        
      ],
      "tag": [
        
      ],
      "tagline": "",
      "thumbnail": "image://http%3a%2f%2fassets.fanart.tv%2ffanart%2ftv%2f80379%2fseasonthumb%2fthe-big-bang-theory-4fd216c6046dd.jpg/",
      "title": "Variabilita večera ve dvou",
      "top250": 0,
      "track": -1,
      "trailer": "",
      "tvshowid": -1,
      "type": "episode",
      "uniqueid": {
        "imdb": "tt2194640",
        "tmdb": "64741",
        "tvdb": "4359108"
      },
      "userrating": 0,
      "votes": "3389",
      "writer": [
        "Steven Molaro",
        "Steve Holland",
        "Maria Ferrari",
        "Eric Kaplan",
        "Jim Reynolds"
      ],
      "year": 2012
    }
  }
}`;

$get_series = `{
  "page": 1,
  "results": [
    {
      "adult": false,
      "backdrop_path": "/7RySzFeK3LPVMXcPtqfZnl6u4p1.jpg",
      "genre_ids": [
        35
      ],
      "id": 1418,
      "origin_country": [
        "US"
      ],
      "original_language": "en",
      "original_name": "The Big Bang Theory",
      "overview": "Physicists Leonard and Sheldon find their nerd-centric social circle with pals Howard and Raj expanding when aspiring actress Penny moves in next door.",
      "popularity": 495.876,
      "poster_path": "/ooBGRQBdbGzBxAVfExiO8r7kloA.jpg",
      "first_air_date": "2007-09-24",
      "name": "The Big Bang Theory",
      "vote_average": 7.899,
      "vote_count": 10941
    },
    {
      "adult": false,
      "backdrop_path": null,
      "genre_ids": [
        35
      ],
      "id": 239645,
      "origin_country": [
        "US"
      ],
      "original_language": "en",
      "original_name": "Untitled 'The Big Bang Theory' spinoff",
      "overview": "This will be a spinoff for the popular TV series \"The Big Bang Theory\".",
      "popularity": 2.618,
      "poster_path": null,
      "first_air_date": "",
      "name": "Untitled 'The Big Bang Theory' spinoff",
      "vote_average": 0.0,
      "vote_count": 0
    }
  ],
  "total_pages": 1,
  "total_results": 2
}`;
$get_series_by_name = `{
  "adult": false,
  "backdrop_path": "/7RySzFeK3LPVMXcPtqfZnl6u4p1.jpg",
  "created_by": [
    {
      "id": 160172,
      "credit_id": "5256d00719c2956ff60a3d0e",
      "name": "Chuck Lorre",
      "original_name": "Chuck Lorre",
      "gender": 2,
      "profile_path": "/8OTRD3d6N0GKy1Z0LJaWZ3MVxXr.jpg"
    },
    {
      "id": 163528,
      "credit_id": "5256d00719c2956ff60a3d14",
      "name": "Bill Prady",
      "original_name": "Bill Prady",
      "gender": 2,
      "profile_path": "/voM7AngVEko9ZzNFuv0F53AMTzu.jpg"
    }
  ],
  "episode_run_time": [
    22
  ],
  "first_air_date": "2007-09-24",
  "genres": [
    {
      "id": 35,
      "name": "Comedy"
    }
  ],
  "homepage": "http://www.cbs.com/shows/big_bang_theory/",
  "id": 1418,
  "in_production": false,
  "languages": [
    "en"
  ],
  "last_air_date": "2019-05-16",
  "last_episode_to_air": {
    "id": 2767846,
    "overview": "Johnny Galecki and Kaley Cuoco will lead fans on a trip down memory lane, sharing some of the best-kept backstage secrets and personal memories from the past 12 years.",
    "name": "Unraveling the Mystery: A Big Bang Farewell",
    "vote_average": 7.9,
    "vote_count": 14,
    "air_date": "2019-05-16",
    "episode_number": 24,
    "episode_type": "standard",
    "production_code": "T12.16024",
    "runtime": 20,
    "season_number": 12,
    "show_id": 1418,
    "still_path": "/eaC2VG6Iy63vIor6mfOfCZTDw3g.jpg"
  },
  "name": "The Big Bang Theory",
  "next_episode_to_air": null,
  "networks": [
    {
      "id": 16,
      "logo_path": "/wju8KhOUsR5y4bH9p3Jc50hhaLO.png",
      "name": "CBS",
      "origin_country": "US"
    }
  ],
  "number_of_episodes": 279,
  "number_of_seasons": 12,
  "origin_country": [
    "US"
  ],
  "original_language": "en",
  "original_name": "The Big Bang Theory",
  "overview": "Physicists Leonard and Sheldon find their nerd-centric social circle with pals Howard and Raj expanding when aspiring actress Penny moves in next door.",
  "popularity": 495.876,
  "poster_path": "/ooBGRQBdbGzBxAVfExiO8r7kloA.jpg",
  "production_companies": [
    {
      "id": 35504,
      "logo_path": "/e70DaugzSRbTbVEhZV3e1nCofcY.png",
      "name": "Chuck Lorre Productions",
      "origin_country": "US"
    },
    {
      "id": 1957,
      "logo_path": "/pJJw98MtNFC9cHn3o15G7vaUnnX.png",
      "name": "Warner Bros. Television",
      "origin_country": "US"
    }
  ],
  "production_countries": [
    {
      "iso_3166_1": "US",
      "name": "United States of America"
    }
  ],
  "seasons": [
    {
      "air_date": null,
      "episode_count": 3,
      "id": 3732,
      "name": "Specials",
      "overview": "",
      "poster_path": "/xYQmc24Gcew5tt5fCA3IDgiOevE.jpg",
      "season_number": 0,
      "vote_average": 0.0
    },
    {
      "air_date": "2007-09-24",
      "episode_count": 17,
      "id": 3738,
      "name": "Season 1",
      "overview": "University physicists Leonard and Sheldon know whether to use an integral or a differential to solve the area under a curve. But they don't have a clue about girls. Or dating. Or clothes. Or parties. Or having fun. Or, basically, life. So when a pretty blonde named Penny moves in the apartment across the hall, the guys decide to get an education outside of the classroom. Boys, you have a lot to learn.",
      "poster_path": "/zqAL2rav7Tg8uwDtLurqZVN3mtr.jpg",
      "season_number": 1,
      "vote_average": 7.3
    },
    {
      "air_date": "2008-09-22",
      "episode_count": 23,
      "id": 3733,
      "name": "Season 2",
      "overview": "This season, Leonard gets a girl. So does Sheldon. Howard drives the Mars Rover into a ditch. Raj woos a terminator. Gorgeous girl-next-door Penny falls under the spell of Age of Conan. And super-smart, ueberconfident Leslie Winkler reduces mere men to spineless jellyfish.",
      "poster_path": "/2NBwUBZ4clwj6qO9fBinfxiB0dR.jpg",
      "season_number": 2,
      "vote_average": 7.4
    },
    {
      "air_date": "2009-09-21",
      "episode_count": 23,
      "id": 3734,
      "name": "Season 3",
      "overview": "Worlds collide in Season 3! A love affair with Penny has opened a big, wide, wonderful world of romance for Leonard. But Sheldon likes the world just the way it was, thank you. All of which makes for a zany comic triangle with brainy, clueless Sheldon and practical, grounded Penny hilariously vying for the role of hypotenuse.",
      "poster_path": "/j64iUb52W2IYE9qV9pLi5tFq8IE.jpg",
      "season_number": 3,
      "vote_average": 7.5
    },
    {
      "air_date": "2010-09-23",
      "episode_count": 24,
      "id": 3735,
      "name": "Season 4",
      "overview": "This season the Big Bang gang’s romantic universe expands. On the rebound from Penny, Leonard falls into the arms of Raj’s sister Priya. Sheldon gets a girlfriend, or rather a friend who is a girl: Amy, a dour neurobiologist who declares herself besties with Penny. Howard and Bernadette heat up. And so do Raj and Bernadette (at least in Raj’s Bollywood daydream).",
      "poster_path": "/hM2TYCmOVXop1xhLA1Mbqyg60ze.jpg",
      "season_number": 4,
      "vote_average": 7.3
    },
    {
      "air_date": "2011-09-22",
      "episode_count": 24,
      "id": 3736,
      "name": "Season 5",
      "overview": "In season five, Penny and Leonard's relationship is relaunched in full \"beta test\" mode, while Sheldon, Howard, and Raj discover the feminine mystique is something that cannot be easily graphed or calculated. As Sheldon makes begrudging amendments to his \"Relationship Agreement\" with his \"friend-who-happens-to-be-a-girl\" Amy Farrah Fowler, Raj contemplates an arranged marriage, and Howard is all-systems-go for both is NASA space launch and wedding to the spirited Bernadette.",
      "poster_path": "/l08Z8ihAsTRPEuOehbwk4axg3cu.jpg",
      "season_number": 5,
      "vote_average": 7.2
    },
    {
      "air_date": "2012-09-27",
      "episode_count": 24,
      "id": 3737,
      "name": "Season 6",
      "overview": "Whether on or above Earth, hilarity is outrageously universal in TV's most popular comedy featuring four forward-thinking but socially backward geniuses. Fun discoveries multiply: Leonard learns jealousy is bad for a relationship (with Penny) but science is good for seduction (of Penny). Howard finds life in the International Space Station life is no escape from terrestrial turmoil between his mom and his new wife Bernadette. Raj meets someone special who may be a good match, if he can keep her from fleeing mid-date. And then there's Sheldon. He learns what not to say after facing harassment charges or competing for tenure at work and how Dungeons \u0026 Dragons can be the icebreaker his relationship with Amy needs.",
      "poster_path": "/2Rsb94mlt4OHhiO2UWatDOhnBqv.jpg",
      "season_number": 6,
      "vote_average": 7.4
    },
    {
      "air_date": "2013-09-26",
      "episode_count": 24,
      "id": 3739,
      "name": "Season 7",
      "overview": "Leonard returns from his North Sea expedition to find that his relationship with Penny involves more beta-testing than he’s ever done in a lab. Howard’s attachment issues with the women in his life in particular and Raj’s social breakthrough with women in general provide more laughs. Bernadette and Amy stand staunchly by the men in their life, even when they’re sitting in marathon role-playing games. Sheldon sees his mom in a totally different way, parties with James Earl Jones, establishes a (sort of) bond with his idol Professor Proton and makes a scientific breakthrough that breaks down before you can say Science Friday.",
      "poster_path": "/e0qyw3fMp7HDIA3dtCkaQD18Ra9.jpg",
      "season_number": 7,
      "vote_average": 7.4
    },
    {
      "air_date": "2014-09-22",
      "episode_count": 24,
      "id": 62016,
      "name": "Season 8",
      "overview": "Sheldon is rescued from his soul-searching cross-country train trip (older but no wiser) and that means The Big Bang Theory gang's all here to spread another gear's cheer as TV's most attended laugh seminar. Enrol in the comic curriculum to observe Leonard's minor surgery, which signals a major catastrophe for Sheldon, Howard's obsession over his mum's relationship with friend-turned-freeloader Stuart and the unexpected results of Penny's technique as a pharmaceutical sales rep. Discover ways to re-create proms not attended or holiday celebrations not especially beloved and play a new game based on Raj's dating life. Savour online fan Fiction by Amy, watch Bernadette take indelicate command of some delicate family matters and, who knows, you might spot a cool special guest or two.",
      "poster_path": "/zwb4rlgJg587XcL2cekvNDnqPpq.jpg",
      "season_number": 8,
      "vote_average": 7.1
    },
    {
      "air_date": "2015-09-21",
      "episode_count": 24,
      "id": 70493,
      "name": "Season 9",
      "overview": "Our two genius roommates, Leonard and Sheldon, and their friends are back once again (smarter, but no wiser). Last season, Sheldon went soul-searching (on a train, of course) and was prepared to make some substantial revisions on his Relationship Agreement with Amy, when everything changed. Leonard, meanwhile, was off to Vegas with Penny to finally tie the knot in the season finale. Howard finds himself alone with Bernadette after the sudden passing of his mother; while Raj is not only talking to women – he’s getting exclusive with Emily. Together, they will all learn that life is far more complicated outside of the lab as love and friendship never produce predictable results!",
      "poster_path": "/dGEugT2ojCWBQjCqovm0GponQ0W.jpg",
      "season_number": 9,
      "vote_average": 7.3
    },
    {
      "air_date": "2016-09-19",
      "episode_count": 24,
      "id": 80035,
      "name": "Season 10",
      "overview": "Leonard and Penny renew their vows, this time inviting their friends and family for wedding party; they also learn that marriage is about compromise, and figure out how to support each other. Sheldon and Amy experiment to take their relationship to the next level, and after an emotional struggle they move in together in Penny's old apartment. Howard and Bernadette realise that being a parent is a full-time job, but with the help of their friends they manage to find joy in raising their child. When his friends tell him he's extremely spoiled, Raj decides to stop taking his father's money and learn how to make ends meet.",
      "poster_path": "/dz2Mq1bpjBFiTOJbomCEP59kqJV.jpg",
      "season_number": 10,
      "vote_average": 6.9
    },
    {
      "air_date": "2017-09-25",
      "episode_count": 24,
      "id": 91000,
      "name": "Season 11",
      "overview": "After years of only looking out for himself, Sheldon found Amy Farrah Fowler to be the most patient woman to ever walk the earth, and... they did it! Wedding fever continues in season 11.",
      "poster_path": "/A373F7AzZtIFy3l2LryC2yr2hC2.jpg",
      "season_number": 11,
      "vote_average": 6.9
    },
    {
      "air_date": "2018-09-24",
      "episode_count": 24,
      "id": 107083,
      "name": "Season 12",
      "overview": "Best friends and brilliant physicists Leonard Hofstadter and Sheldon Cooper are geniuses in the lab but socially challenge outside of it. Despite this, Leonard married his beautiful, street-smart neighbour, Penny. And Sheldon, after a long courtship, wed successful neurobiologist Amy. And while aerospace engineer Howard and his adorable microbiologist wife, Bernadette, explore the predicament of being married with two kids, astrophysicist Raj considers a traditional arranged marriage. As the supersmart friends solve quotidian conundrums posed by academia. Family crises and video games, their experiments in domestic bliss never fail to produce hilarious results. But all good theories arrive at a conclusion. The twelfth and final season of \"television's perpetual laughter continuum comprises\" 24 supercharged episodes that take comedy to the next dimension...and beyond.",
      "poster_path": "/txta7TTNUfGCgsJI9oB6vb6uFlA.jpg",
      "season_number": 12,
      "vote_average": 7.0
    }
  ],
  "spoken_languages": [
    {
      "english_name": "English",
      "iso_639_1": "en",
      "name": "English"
    }
  ],
  "status": "Ended",
  "tagline": "Smart is the new sexy.",
  "type": "Scripted",
  "vote_average": 7.899,
  "vote_count": 10941
}`;
$get_series_by_id = `{
  "adult": false,
  "backdrop_path": "/7RySzFeK3LPVMXcPtqfZnl6u4p1.jpg",
  "created_by": [
    {
      "id": 160172,
      "credit_id": "5256d00719c2956ff60a3d0e",
      "name": "Chuck Lorre",
      "original_name": "Chuck Lorre",
      "gender": 2,
      "profile_path": "/8OTRD3d6N0GKy1Z0LJaWZ3MVxXr.jpg"
    },
    {
      "id": 163528,
      "credit_id": "5256d00719c2956ff60a3d14",
      "name": "Bill Prady",
      "original_name": "Bill Prady",
      "gender": 2,
      "profile_path": "/voM7AngVEko9ZzNFuv0F53AMTzu.jpg"
    }
  ],
  "episode_run_time": [
    22
  ],
  "first_air_date": "2007-09-24",
  "genres": [
    {
      "id": 35,
      "name": "Comedy"
    }
  ],
  "homepage": "http://www.cbs.com/shows/big_bang_theory/",
  "id": 1418,
  "in_production": false,
  "languages": [
    "en"
  ],
  "last_air_date": "2019-05-16",
  "last_episode_to_air": {
    "id": 2767846,
    "overview": "Johnny Galecki and Kaley Cuoco will lead fans on a trip down memory lane, sharing some of the best-kept backstage secrets and personal memories from the past 12 years.",
    "name": "Unraveling the Mystery: A Big Bang Farewell",
    "vote_average": 7.9,
    "vote_count": 14,
    "air_date": "2019-05-16",
    "episode_number": 24,
    "episode_type": "standard",
    "production_code": "T12.16024",
    "runtime": 20,
    "season_number": 12,
    "show_id": 1418,
    "still_path": "/eaC2VG6Iy63vIor6mfOfCZTDw3g.jpg"
  },
  "name": "The Big Bang Theory",
  "next_episode_to_air": null,
  "networks": [
    {
      "id": 16,
      "logo_path": "/wju8KhOUsR5y4bH9p3Jc50hhaLO.png",
      "name": "CBS",
      "origin_country": "US"
    }
  ],
  "number_of_episodes": 279,
  "number_of_seasons": 12,
  "origin_country": [
    "US"
  ],
  "original_language": "en",
  "original_name": "The Big Bang Theory",
  "overview": "Physicists Leonard and Sheldon find their nerd-centric social circle with pals Howard and Raj expanding when aspiring actress Penny moves in next door.",
  "popularity": 495.876,
  "poster_path": "/ooBGRQBdbGzBxAVfExiO8r7kloA.jpg",
  "production_companies": [
    {
      "id": 35504,
      "logo_path": "/e70DaugzSRbTbVEhZV3e1nCofcY.png",
      "name": "Chuck Lorre Productions",
      "origin_country": "US"
    },
    {
      "id": 1957,
      "logo_path": "/pJJw98MtNFC9cHn3o15G7vaUnnX.png",
      "name": "Warner Bros. Television",
      "origin_country": "US"
    }
  ],
  "production_countries": [
    {
      "iso_3166_1": "US",
      "name": "United States of America"
    }
  ],
  "seasons": [
    {
      "air_date": null,
      "episode_count": 3,
      "id": 3732,
      "name": "Specials",
      "overview": "",
      "poster_path": "/xYQmc24Gcew5tt5fCA3IDgiOevE.jpg",
      "season_number": 0,
      "vote_average": 0.0
    },
    {
      "air_date": "2007-09-24",
      "episode_count": 17,
      "id": 3738,
      "name": "Season 1",
      "overview": "University physicists Leonard and Sheldon know whether to use an integral or a differential to solve the area under a curve. But they don't have a clue about girls. Or dating. Or clothes. Or parties. Or having fun. Or, basically, life. So when a pretty blonde named Penny moves in the apartment across the hall, the guys decide to get an education outside of the classroom. Boys, you have a lot to learn.",
      "poster_path": "/zqAL2rav7Tg8uwDtLurqZVN3mtr.jpg",
      "season_number": 1,
      "vote_average": 7.3
    },
    {
      "air_date": "2008-09-22",
      "episode_count": 23,
      "id": 3733,
      "name": "Season 2",
      "overview": "This season, Leonard gets a girl. So does Sheldon. Howard drives the Mars Rover into a ditch. Raj woos a terminator. Gorgeous girl-next-door Penny falls under the spell of Age of Conan. And super-smart, ueberconfident Leslie Winkler reduces mere men to spineless jellyfish.",
      "poster_path": "/2NBwUBZ4clwj6qO9fBinfxiB0dR.jpg",
      "season_number": 2,
      "vote_average": 7.4
    },
    {
      "air_date": "2009-09-21",
      "episode_count": 23,
      "id": 3734,
      "name": "Season 3",
      "overview": "Worlds collide in Season 3! A love affair with Penny has opened a big, wide, wonderful world of romance for Leonard. But Sheldon likes the world just the way it was, thank you. All of which makes for a zany comic triangle with brainy, clueless Sheldon and practical, grounded Penny hilariously vying for the role of hypotenuse.",
      "poster_path": "/j64iUb52W2IYE9qV9pLi5tFq8IE.jpg",
      "season_number": 3,
      "vote_average": 7.5
    },
    {
      "air_date": "2010-09-23",
      "episode_count": 24,
      "id": 3735,
      "name": "Season 4",
      "overview": "This season the Big Bang gang’s romantic universe expands. On the rebound from Penny, Leonard falls into the arms of Raj’s sister Priya. Sheldon gets a girlfriend, or rather a friend who is a girl: Amy, a dour neurobiologist who declares herself besties with Penny. Howard and Bernadette heat up. And so do Raj and Bernadette (at least in Raj’s Bollywood daydream).",
      "poster_path": "/hM2TYCmOVXop1xhLA1Mbqyg60ze.jpg",
      "season_number": 4,
      "vote_average": 7.3
    },
    {
      "air_date": "2011-09-22",
      "episode_count": 24,
      "id": 3736,
      "name": "Season 5",
      "overview": "In season five, Penny and Leonard's relationship is relaunched in full \"beta test\" mode, while Sheldon, Howard, and Raj discover the feminine mystique is something that cannot be easily graphed or calculated. As Sheldon makes begrudging amendments to his \"Relationship Agreement\" with his \"friend-who-happens-to-be-a-girl\" Amy Farrah Fowler, Raj contemplates an arranged marriage, and Howard is all-systems-go for both is NASA space launch and wedding to the spirited Bernadette.",
      "poster_path": "/l08Z8ihAsTRPEuOehbwk4axg3cu.jpg",
      "season_number": 5,
      "vote_average": 7.2
    },
    {
      "air_date": "2012-09-27",
      "episode_count": 24,
      "id": 3737,
      "name": "Season 6",
      "overview": "Whether on or above Earth, hilarity is outrageously universal in TV's most popular comedy featuring four forward-thinking but socially backward geniuses. Fun discoveries multiply: Leonard learns jealousy is bad for a relationship (with Penny) but science is good for seduction (of Penny). Howard finds life in the International Space Station life is no escape from terrestrial turmoil between his mom and his new wife Bernadette. Raj meets someone special who may be a good match, if he can keep her from fleeing mid-date. And then there's Sheldon. He learns what not to say after facing harassment charges or competing for tenure at work and how Dungeons \u0026 Dragons can be the icebreaker his relationship with Amy needs.",
      "poster_path": "/2Rsb94mlt4OHhiO2UWatDOhnBqv.jpg",
      "season_number": 6,
      "vote_average": 7.4
    },
    {
      "air_date": "2013-09-26",
      "episode_count": 24,
      "id": 3739,
      "name": "Season 7",
      "overview": "Leonard returns from his North Sea expedition to find that his relationship with Penny involves more beta-testing than he’s ever done in a lab. Howard’s attachment issues with the women in his life in particular and Raj’s social breakthrough with women in general provide more laughs. Bernadette and Amy stand staunchly by the men in their life, even when they’re sitting in marathon role-playing games. Sheldon sees his mom in a totally different way, parties with James Earl Jones, establishes a (sort of) bond with his idol Professor Proton and makes a scientific breakthrough that breaks down before you can say Science Friday.",
      "poster_path": "/e0qyw3fMp7HDIA3dtCkaQD18Ra9.jpg",
      "season_number": 7,
      "vote_average": 7.4
    },
    {
      "air_date": "2014-09-22",
      "episode_count": 24,
      "id": 62016,
      "name": "Season 8",
      "overview": "Sheldon is rescued from his soul-searching cross-country train trip (older but no wiser) and that means The Big Bang Theory gang's all here to spread another gear's cheer as TV's most attended laugh seminar. Enrol in the comic curriculum to observe Leonard's minor surgery, which signals a major catastrophe for Sheldon, Howard's obsession over his mum's relationship with friend-turned-freeloader Stuart and the unexpected results of Penny's technique as a pharmaceutical sales rep. Discover ways to re-create proms not attended or holiday celebrations not especially beloved and play a new game based on Raj's dating life. Savour online fan Fiction by Amy, watch Bernadette take indelicate command of some delicate family matters and, who knows, you might spot a cool special guest or two.",
      "poster_path": "/zwb4rlgJg587XcL2cekvNDnqPpq.jpg",
      "season_number": 8,
      "vote_average": 7.1
    },
    {
      "air_date": "2015-09-21",
      "episode_count": 24,
      "id": 70493,
      "name": "Season 9",
      "overview": "Our two genius roommates, Leonard and Sheldon, and their friends are back once again (smarter, but no wiser). Last season, Sheldon went soul-searching (on a train, of course) and was prepared to make some substantial revisions on his Relationship Agreement with Amy, when everything changed. Leonard, meanwhile, was off to Vegas with Penny to finally tie the knot in the season finale. Howard finds himself alone with Bernadette after the sudden passing of his mother; while Raj is not only talking to women – he’s getting exclusive with Emily. Together, they will all learn that life is far more complicated outside of the lab as love and friendship never produce predictable results!",
      "poster_path": "/dGEugT2ojCWBQjCqovm0GponQ0W.jpg",
      "season_number": 9,
      "vote_average": 7.3
    },
    {
      "air_date": "2016-09-19",
      "episode_count": 24,
      "id": 80035,
      "name": "Season 10",
      "overview": "Leonard and Penny renew their vows, this time inviting their friends and family for wedding party; they also learn that marriage is about compromise, and figure out how to support each other. Sheldon and Amy experiment to take their relationship to the next level, and after an emotional struggle they move in together in Penny's old apartment. Howard and Bernadette realise that being a parent is a full-time job, but with the help of their friends they manage to find joy in raising their child. When his friends tell him he's extremely spoiled, Raj decides to stop taking his father's money and learn how to make ends meet.",
      "poster_path": "/dz2Mq1bpjBFiTOJbomCEP59kqJV.jpg",
      "season_number": 10,
      "vote_average": 6.9
    },
    {
      "air_date": "2017-09-25",
      "episode_count": 24,
      "id": 91000,
      "name": "Season 11",
      "overview": "After years of only looking out for himself, Sheldon found Amy Farrah Fowler to be the most patient woman to ever walk the earth, and... they did it! Wedding fever continues in season 11.",
      "poster_path": "/A373F7AzZtIFy3l2LryC2yr2hC2.jpg",
      "season_number": 11,
      "vote_average": 6.9
    },
    {
      "air_date": "2018-09-24",
      "episode_count": 24,
      "id": 107083,
      "name": "Season 12",
      "overview": "Best friends and brilliant physicists Leonard Hofstadter and Sheldon Cooper are geniuses in the lab but socially challenge outside of it. Despite this, Leonard married his beautiful, street-smart neighbour, Penny. And Sheldon, after a long courtship, wed successful neurobiologist Amy. And while aerospace engineer Howard and his adorable microbiologist wife, Bernadette, explore the predicament of being married with two kids, astrophysicist Raj considers a traditional arranged marriage. As the supersmart friends solve quotidian conundrums posed by academia. Family crises and video games, their experiments in domestic bliss never fail to produce hilarious results. But all good theories arrive at a conclusion. The twelfth and final season of \"television's perpetual laughter continuum comprises\" 24 supercharged episodes that take comedy to the next dimension...and beyond.",
      "poster_path": "/txta7TTNUfGCgsJI9oB6vb6uFlA.jpg",
      "season_number": 12,
      "vote_average": 7.0
    }
  ],
  "spoken_languages": [
    {
      "english_name": "English",
      "iso_639_1": "en",
      "name": "English"
    }
  ],
  "status": "Ended",
  "tagline": "Smart is the new sexy.",
  "type": "Scripted",
  "vote_average": 7.899,
  "vote_count": 10941
}`;
// movie
$get_kodi_movie = `{
  "id": 1,
  "jsonrpc": "2.0",
  "result": {
    "item": {
      "album": "",
      "art": {
        "banner": "image://https%3a%2f%2fassets.fanart.tv%2ffanart%2fmovies%2f361743%2fmoviebanner%2ftop-gun-maverick-5df70d08467df.jpg/",
        "clearart": "image://https%3a%2f%2fassets.fanart.tv%2ffanart%2fmovies%2f361743%2fhdmovieclearart%2ftop-gun-maverick-6231fe7090463.png/",
        "clearlogo": "image://https%3a%2f%2fassets.fanart.tv%2ffanart%2fmovies%2f361743%2fhdmovielogo%2ftop-gun-2-5d4231c001718.png/",
        "fanart": "image://https%3a%2f%2fimage.tmdb.org%2ft%2fp%2foriginal%2f%2fAaV1YIdWKnjAIAOe8UUKBFm327v.jpg/",
        "icon": "image://DefaultVideo.png/",
        "poster": "image://https%3a%2f%2fimage.tmdb.org%2ft%2fp%2foriginal%2f%2f62HCnUTziyWcpDaBO2i1DX17ljH.jpg/",
        "thumb": "image://https%3a%2f%2fassets.fanart.tv%2ffanart%2fmovies%2f361743%2fmoviethumb%2ftop-gun-maverick-5df70aca9a1c8.jpg/"
      },
      "artist": [
        
      ],
      "cast": [
        
      ],
      "country": [
        
      ],
      "customproperties": {
        "AudioChannels.1": 8,
        "AudioCodec.1": "MLP FBA",
        "AudioLanguage.1": "en",
        "contextmenuaction(0)": "RunPlugin(plugin://plugin.video.stream-cinema-2-release/command/?command=trakt-media-menu&id=297485&media_type=movie&title=Top+Gun%3A+Maverick)",
        "contextmenuaction(1)": "RunPlugin(plugin://plugin.video.stream-cinema-2-release/command/?command=trakt_mark_as_watched&trakt_id=297485&media_type=movie)",
        "contextmenuaction(2)": "RunPlugin(plugin://plugin.video.stream-cinema-2-release/command/?command=play-trailer&media_id=6304813ef6dc6c9877458da7)",
        "contextmenulabel(0)": "Trakt.tv Menu",
        "contextmenulabel(1)": "[COLOR lightskyblue]Trakt[/COLOR] Mark as watched",
        "contextmenulabel(2)": "Play the trailer",
        "isplayable": "true",
        "libraryartfilled": true,
        "original_listitem_url": "plugin://plugin.video.stream-cinema-2-release/resolve_media_item/?media_id=6304813ef6dc6c9877458da7"
      },
      "dateadded": "",
      "director": [
        
      ],
      "dynpath": "plugin://plugin.video.stream-cinema-2-release/resolve_media_item/?media_id=6304813ef6dc6c9877458da7",
      "episode": -1,
      "episodeguide": "",
      "fanart": "image://https%3a%2f%2fimage.tmdb.org%2ft%2fp%2foriginal%2f%2fAaV1YIdWKnjAIAOe8UUKBFm327v.jpg/",
      "file": "plugin://plugin.video.stream-cinema-2-release/resolve_media_item/?media_id=6304813ef6dc6c9877458da7",
      "firstaired": "",
      "genre": [
        
      ],
      "imdbnumber": "",
      "label": "Top Gun: Maverick",
      "lastplayed": "2024-06-03 17:47:14",
      "mediapath": "plugin://plugin.video.stream-cinema-2-release/resolve_media_item/?media_id=6304813ef6dc6c9877458da7",
      "mpaa": "",
      "originaltitle": "",
      "playcount": 0,
      "plot": "",
      "plotoutline": "",
      "premiered": "",
      "productioncode": "",
      "rating": 0.0,
      "resume": {
        "position": 6131.691711,
        "total": 7814.578
      },
      "runtime": 7814,
      "season": -1,
      "set": "",
      "setid": -1,
      "showlink": [
        
      ],
      "showtitle": "",
      "sorttitle": "",
      "specialsortepisode": -1,
      "specialsortseason": -1,
      "streamdetails": {
        "audio": [
          {
            "channels": 8,
            "codec": "MLP FBA",
            "language": "en"
          }
        ],
        "subtitle": [
          
        ],
        "video": [
          {
            "aspect": 1.777999997138977,
            "codec": "HEVC",
            "duration": 7814,
            "height": 2160,
            "language": "",
            "stereomode": "",
            "width": 3840
          }
        ]
      },
      "studio": [
        
      ],
      "tag": [
        
      ],
      "tagline": "",
      "thumbnail": "image://https%3a%2f%2fassets.fanart.tv%2ffanart%2fmovies%2f361743%2fmoviethumb%2ftop-gun-maverick-5df70aca9a1c8.jpg/",
      "title": "",
      "top250": 0,
      "track": -1,
      "trailer": "",
      "tvshowid": -1,
      "type": "unknown",
      "userrating": 0,
      "votes": "0",
      "writer": [
        
      ],
      "year": 0
    }
  }
}`;
$get_movie_by_name = `{
  "page": 1,
  "results": [
    {
      "adult": false,
      "backdrop_path": "/AaV1YIdWKnjAIAOe8UUKBFm327v.jpg",
      "genre_ids": [
        28,
        18
      ],
      "id": 361743,
      "original_language": "en",
      "original_title": "Top Gun: Maverick",
      "overview": "After more than thirty years of service as one of the Navy’s top aviators, and dodging the advancement in rank that would ground him, Pete “Maverick” Mitchell finds himself training a detachment of TOP GUN graduates for a specialized mission the likes of which no living pilot has ever seen.",
      "popularity": 170.614,
      "poster_path": "/62HCnUTziyWcpDaBO2i1DX17ljH.jpg",
      "release_date": "2022-05-21",
      "title": "Top Gun: Maverick",
      "video": false,
      "vote_average": 8.218,
      "vote_count": 8649
    },
    {
      "adult": false,
      "backdrop_path": "/l1GmkC9EJLDVRt8RxT64cet6QUQ.jpg",
      "genre_ids": [
        99,
        10770
      ],
      "id": 1076135,
      "original_language": "fr",
      "original_title": "Top Gun Maverick : Le phénomène",
      "overview": "36 years after the release of the first \"Top Gun\", this sequel has been eagerly awaited by fans around the world. Didier Allouch talks about the success of the film in France and around the world.",
      "popularity": 5.564,
      "poster_path": "/4t4GS16zOkdewJzeRZZwy3m7Y76.jpg",
      "release_date": "2022-12-23",
      "title": "Top Gun Maverick : Le phénomène",
      "video": false,
      "vote_average": 4.8,
      "vote_count": 2
    }
  ],
  "total_pages": 1,
  "total_results": 2
}`;
$get_movie_info_by_id = `{
  "adult": false,
  "backdrop_path": "/AaV1YIdWKnjAIAOe8UUKBFm327v.jpg",
  "belongs_to_collection": {
    "id": 531330,
    "name": "Top Gun Collection",
    "poster_path": "/wtpIx0Gsra1IGHH8af5kNK90Xy8.jpg",
    "backdrop_path": "/9MGm0XT04ob99MyGQfMT7I8y3UE.jpg"
  },
  "budget": 170000000,
  "genres": [
    {
      "id": 28,
      "name": "Action"
    },
    {
      "id": 18,
      "name": "Drama"
    }
  ],
  "homepage": "https://www.topgunmovie.com",
  "id": 361743,
  "imdb_id": "tt1745960",
  "origin_country": [
    "US"
  ],
  "original_language": "en",
  "original_title": "Top Gun: Maverick",
  "overview": "After more than thirty years of service as one of the Navy’s top aviators, and dodging the advancement in rank that would ground him, Pete “Maverick” Mitchell finds himself training a detachment of TOP GUN graduates for a specialized mission the likes of which no living pilot has ever seen.",
  "popularity": 170.614,
  "poster_path": "/62HCnUTziyWcpDaBO2i1DX17ljH.jpg",
  "production_companies": [
    {
      "id": 82819,
      "logo_path": "/gXfFl9pRPaoaq14jybEn1pHeldr.png",
      "name": "Skydance Media",
      "origin_country": "US"
    },
    {
      "id": 10288,
      "logo_path": "/Aszf09kIVXR6cwG9lwjZIawbYVS.png",
      "name": "Don Simpson/Jerry Bruckheimer Films",
      "origin_country": "US"
    },
    {
      "id": 4,
      "logo_path": "/gz66EfNoYPqHTYI4q9UEN4CbHRc.png",
      "name": "Paramount",
      "origin_country": "US"
    }
  ],
  "production_countries": [
    {
      "iso_3166_1": "US",
      "name": "United States of America"
    }
  ],
  "release_date": "2022-05-21",
  "revenue": 1488732821,
  "runtime": 131,
  "spoken_languages": [
    {
      "english_name": "English",
      "iso_639_1": "en",
      "name": "English"
    }
  ],
  "status": "Released",
  "tagline": "Feel the need... The need for speed.",
  "title": "Top Gun: Maverick",
  "video": false,
  "vote_average": 8.218,
  "vote_count": 8650
}`;
