<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear un Espacio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <x-createcard-spaces :modalities="$modalities" :services="$services" :spaceTypes="$spaceTypes" />
                </div>
            </div>
        </div>
    </div>
    <script>
        const {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph
        } = CKEDITOR;

        document.querySelectorAll('.editor').forEach(editor => {
            ClassicEditor
            .create(editor, {
                licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NzIwNjM5OTksImp0aSI6IjM3MWJjM2ZlLWQ0NWUtNGFlMy1hODZiLThiMDM1NjhjZjk5ZiIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIl0sInZjIjoiZjBiNjJiZGEifQ.HrWTlJca-0czOarDUZePgwLDF2YQYR1Daqf0Fst_MRfdem7d2YNFy8DC2vunNv4JgNb_togDju9-DwS8Ueu-wA',
                plugins: [ Essentials, Bold, Italic, Font, Paragraph],
                toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|'
                ]
            })
            .then( /* ... */ )
            .catch( /* ... */ );
        });
        </script>
</x-app-layout>