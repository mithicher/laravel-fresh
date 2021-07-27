@props(array_merge([
	'id' => null,
	'label' => null,
	'name' => null,
	'hint' => null,
	'withErrorMessage' => true,
	'errorMessageFor' => null,
	'optional' => false,
	'noMargin' => false,
	'acceptFiles' => 'image/png,image/jpeg,image/jpg,image/gif',
	'maxFileSize' => '2MB', // 500KB
	'maxFiles' => 1,
	'multiple' => false,
	'withPreview' => false,
	'withPreviewInGrid' => false,
	'previewHeight' => 170,
	'withBackground' => 'yes',
	'withPdfPreview' => false,
	'labelIdle' => null
], $extraAttributes ?? []))


@php
	$filepondBackgroundColor = [
		'yes' => '#f7fafc',
		'no' => '#ffffff'
	][$withBackground];
@endphp

<div class="{{ $noMargin ? 'mb-0' : 'mb-5' }}">
	@if($label)
		<x-label class="mb-1" for="{{ $name }}" :optional="$optional">{{ $label }}</x-label>
    @endif

	<div
		class="relative"
		@destroy-filepond.window="pond.removeFiles()"
		wire:ignore
		x-data="{ 
			pond: null,
			hasError: false,
			errorText: '',
			errorTimeout: null,
			maxFileSize: '{{ $maxFileSize }}',
			maxFiles: '{{ $maxFiles }}',
			allowedFiles: '{{ $acceptFiles }}',
			imagePreviewHeight: {{ $previewHeight }}
		}"
		x-init="
			FilePond.registerPlugin(FilePondPluginFileValidateType);
			FilePond.registerPlugin(FilePondPluginFileValidateSize);
			FilePond.registerPlugin(FilePondPluginImagePreview);

			@if ($withPdfPreview)
				FilePond.registerPlugin(FilePondPluginPdfPreview);
			@endif

			pond = FilePond.create($refs.input);
			pond.setOptions({
				instantUpload: true,
				allowMultiple: {{ isset($multiple) ? 'true' : 'false' }},
				labelIdle: `{{ $labelIdle ?? "Drag & Drop your file or <span class='filepond--label-action'>Browse</span>" }}`,
				labelFileProcessingComplete: 'Upload complete',

				@if ($withPdfPreview)
					allowPdfPreview: true,
					pdfPreviewHeight: parseInt(imagePreviewHeight),
					pdfComponentExtraParams: 'toolbar=0&view=fit&page=1',  
				@endif        

				imagePreviewHeight: parseInt(imagePreviewHeight),
				filePosterMaxHeight: parseInt(imagePreviewHeight),
				instantUpload: true,
				maxFiles: maxFiles,
				maxFileSize: maxFileSize,
				acceptedFileTypes: allowedFiles.split(','),

				server: {
					process: (fieldname, file, metaData, load, error, progress, abort, transfer, options) => {
						@this.upload('{{ $attributes->wire('model')->value }}', file, load, error, progress)
					},

					revert: (filename, load) => {
						@this.removeUpload('{{ $attributes->wire('model')->value }}', filename, load)
					}
				},

				onwarning: (error, file, status) => {
					if (file.length > parseInt(maxFiles)) {
						errorText = `The maximum number of files is ${maxFiles}`;
						
						clearTimeout(errorTimeout); 
						hasError = true;
						errorTimeout = setTimeout(() => { hasError = false }, 3500);
					}
				}
			});
		"
		x-cloak>

		<div
			x-transition:enter="transition ease-out duration-300"
			x-transition:enter-start="opacity-0 transform scale-95"
			x-transition:enter-end="opacity-100 transform scale-100"
			x-transition:leave="transition ease-in duration-200"
			x-transition:leave-start="opacity-100 transform scale-100"
			x-transition:leave-end="opacity-0 transform scale-95"
			x-show="hasError"
			style="display: none;"
			class="z-10 text-sm text-center bg-red-100 text-red-600 rounded-full px-2 py-1 w-64 mx-auto absolute top-0 left-0 right-0 mt-5"
			x-text="errorText"
			x-cloak
		></div>

		<input
			x-ref="input"
			type="file" 
			name="{{ $attributes->wire('model')->value }}"
			data-allow-reorder="false"
			accept="{{ $acceptFiles }}" 
			data-max-files="{{ $maxFiles }}"

			@if ($multiple)
				multiple
			@endif
		/>
	</div>
	
	@if($withErrorMessage)
		<x-input-error for="{{ $errorMessageFor ?? $name }}" class="mt-2" />
	@endif

	@isset($hint)
		<x-text-hint class="mt-2">{{ $hint }}</x-text-hint>
	@endisset
</div>

@once
@push('styles')
	<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
	<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
	@if ($withPdfPreview)
		<link href="https://unpkg.com/filepond-plugin-pdf-preview/dist/filepond-plugin-pdf-preview.min.css" rel="stylesheet">
	@endif
	<style>
		.filepond--panel-root {
			background-color: white;
			border: 2px dashed #e2e8f0;
		}
	</style>

	@if ($withPreviewInGrid)
		<style>
			@media (min-width: 30em) {
				.filepond--item {
					width: calc(50% - 0.5em);
				}
			}

			@media (min-width: 50em) {
				.filepond--item {
					width: calc(33.33% - 0.5em);
				}
			}
		</style>
	@endif
@endpush

@push('scripts')
	<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
	<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
	<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
	@if ($withPdfPreview)
		<script src="https://unpkg.com/filepond-plugin-pdf-preview/dist/filepond-plugin-pdf-preview.min.js"></script>
	@endif
	<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
@endpush
@endonce
