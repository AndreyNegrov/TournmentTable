#API documentation

### Create Division [POST /api/division]
+ Request (application/json)
    + Attributes(object)
        + division_name: `A` (string, required)

+ Response 200 (application/json)
    + Attributes(object)
        + id: 1 (number)

+ Response 422 (application/json)
    + Attributes(object)
        + message: `The value 123 is not a valid string` (string)

### Create Team [POST /api/team]
+ Request (application/json)
    + Attributes(object)
        + division_id: 1 (number, required)
        + team_name: `Barcelona` (string, required)

+ Response 200 (application/json)
    + Attributes(object)
        + id: 1 (number)

+ Response 422 (application/json)
    + Attributes(object)
        + message: `The value 123 is not a valid string` (string)

### Change Division Game Result [POST /api/division-game/change-result]
+ Request (application/json)
    + Attributes(object)
        + team_id: 2 (number, required)
        + opponent_id: 3 (number, required)
        + result: `first_team_win` (string, required)

+ Response 200 (application/json)
    + Attributes(object)
        + status: `ok` (string)

+ Response 422 (application/json)
    + Attributes(object)
        + message: `The value 123 is not a valid string` (string)

### Change Team Score [POST /api/team/change-score]
+ Request (application/json)
    + Attributes(object)
        + team_id: 2 (number, required)
        + score: 3 (number, required)

+ Response 200 (application/json)
    + Attributes(object)
        + status: `ok` (string)

+ Response 422 (application/json)
    + Attributes(object)
        + message: `The value 123 is not a valid string` (string)

### Change Team Rating [POST /api/team/change-rating]
+ Request (application/json)
    + Attributes(object)
        + team_id: 2 (number, required)
        + rating: 3 (number, required)

+ Response 200 (application/json)
    + Attributes(object)
        + status: `ok` (string)

+ Response 422 (application/json)
    + Attributes(object)
        + message: `The value 123 is not a valid string` (string)

### Create Play-Off [POST /api/play-off]
+ Request (application/json)
    + Attributes(object)
        + team_id: 2 (number, required)
        + opponent_id: 3 (number, required)
        + stage: `quarter` (string, required)
        + result: `first_team_win` (string, required)

+ Response 200 (application/json)
    + Attributes(object)
        + id: 1 (number)

+ Response 422 (application/json)
    + Attributes(object)
        + message: `The value 123 is not a valid string` (string)

### Change Play-off result [POST /api/play-off/change-result]
+ Request (application/json)
    + Attributes(object)
        + team_id: 2 (number, required)
        + stage: `quarter` (string, required)
        + result: `first_team_win` (string, required)

+ Response 200 (application/json)
    + Attributes(object)
        + status: `ok` (string)

+ Response 422 (application/json)
    + Attributes(object)
        + message: `The value 123 is not a valid string` (string)

### Get Tournament Data [GET /api/tournament]
+ Response 200 (application/json)
    + Attributes(object)
        + teams (array[Object])
            + id: 1 (number)
            + name: `Barcelona` (string)
            + division_id: 1 (number)
            + score: 1 (number)
            + rating: 2 (number)
        + divisions (array[Object])
          + id: 1 (number)
            + name: `A` (string)
            + games: (array[Object])
              + id: 1 (number)
              + team_id: 1 (number)
              + opponent_id: 2 (number)
              + result: `first_team_win` (string)
        + play_off_games (array[Object])
          + id: 1 (number)
          + team_id: 1 (number)
          + opponent_id: 2 (number)
          + result: `first_team_win` (string)
          + stage: `quarter` (string)
