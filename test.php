<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            background-color: #019992;
            display: flex;
            justify-content: center;
            font-family: sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        .head-content {
            display: flex;
            justify-content: space-between;
            width: 500px;
            align-items: flex-end;
            color: white;
        }

        button {
            padding: 10px 15px;
            border-radius: 15px;
            background-color: #FFB001;
            font-size: 15px;
            font-weight: bold;
            border-style: none;
            cursor: pointer;
            color: white;
        }

        .head-content:first-child {
            font-size: 30px;
            font-weight: bold;
        }

        .hidden {
            display: none;
        }

        .data-content {
            display: flex;
            flex-direction: row;
            width: 500px;
            border-radius: 20px;
            margin: 15px 0px;
            background: linear-gradient(to top,
                    #D2E5D0 0%,
                    #D2E5D0 50%,
                    #AAD6A0 50%,
                    #AAD6A0 100%);
            box-shadow: 0 5px 0px 0px #1A5653;
        }

        .sr-no {
            font-size: 35px;
            font-weight: 800;
            background-color: #44EE77;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            padding: 15px 15px;
            color: white;
        }

        .name-location {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            width: 450px;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            font-weight: 500;
            font-size: 25px;
            margin: 0px 15px;
        }

        .footer {
            text-align: center;
            font-weight: bold;
            color: white;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="head-content">
            <p>PEOPLE DATA</p>
            <p><button>NEXT PERSON</button></p>
        </div>
        <div class="">
            <?php
            $json_data = file_get_contents('data.json');
            $data = json_decode($json_data, true);
            echo "
                <div class=''>
                    <div class='data-content'>
                        <div class='sr-no'>
                            <p>1</p>
                        </div>
                        <div class='name-location'>
                            <p> Name: " . $data[0]["name"] . "</p>
                            <p> Location: " . $data[0]["location"] . "</p>
                        </div>
                    </div>
                </div>";
            foreach ($data as $key => $value) {
                $key = $key + 1;
                if ($key > 1) {
                    echo "<div class='hidden'>
                            <div class='data-content'>
                                <div class='sr-no'>
                                    <p>" . $key . "</p>
                                </div>
                                <div class='name-location'>
                                    <p> Name: " . $value["name"] . "</p>
                                    <p> Location: " . $value["location"] . "</p>
                                </div>
                            </div>
                            </div>";
                }
            }
            ?>
            <div class='footer'>CURRENTLY <span id='footer'>1</span> PEOPLE SHOWING</div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    const data = document.querySelectorAll('.hidden');
    const button = document.querySelector('button');

    button.addEventListener('click', addData(data), false);
    function addData(data) {

        let index = 0;
        let count = 2;

        return function() {
            if (index < data.length) {
                data[index].classList.remove('hidden');
                console.log(index)
                let footer = document.getElementById('footer');
                footer.innerHTML = count;
                ++count;
                ++index;
            }
        }
    }
</script>