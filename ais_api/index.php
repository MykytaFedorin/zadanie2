<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<table id="subjectTable">
    <thead>
        <tr>
            <th>Subject ID</th>
            <th>Name</th>
            <th>Day</th>
            <th>Room</th>
            <th>Subject Type</th>
        </tr>
    </thead>
    <tbody id="subjectTableBody">
        <!-- Data will be inserted here dynamically -->
    </tbody>
</table>

    <button id="downloadBtn">Download Schedule</button>
    <button id="deleteBtn">Delete Schedule</button>

    <!-- Создаем блок для отображения результата загрузки расписания -->
    <div id="scheduleResult">
        <p id="resultText"></p> <!-- Тег для вывода полученного текста -->
    </div>

<script>
    $(document).ready(function() {
        // Функция для загрузки данных и отображения их в таблице
        function fetchSubjects() {
            $.ajax({
                url: 'https://node34.webte.fei.stuba.sk/zadanie2/ais_api/subjects',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const subjects = data.subjects;
                    const tableBody = $('#subjectTableBody');
                    tableBody.empty(); // Очищаем содержимое тела таблицы перед добавлением новых данных

                    $.each(subjects, function(index, subject) {
                        const row = $('<tr>');
                        row.append($('<td>').text(subject.subject_id));
                        row.append($('<td>').text(subject.name));
                        row.append($('<td>').text(subject.day));
                        row.append($('<td>').text(subject.room));
                        row.append($('<td>').text(subject.subject_type));
                        tableBody.append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching subjects:', error);
                }
            });
        }

        // Загружаем данные при загрузке страницы
        fetchSubjects();

        // Обработчик события для кнопки "Refresh"
        $('#refreshButton').click(function() {
            fetchSubjects();
        });
    });
</script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src='./js/main.js'></script>
</body>
</html>

