@props([
	'rows' => [],
	'columns' => [],
	'striped' => false,
	'actionText' => 'Action',
	'tableTextLinkLabel' => 'Link',
])

<div 
	x-data="{
		columns: {{ collect($columns) }},
		rows: {{ collect($rows) }},
		isStriped: Boolean({{ $striped }})
	}"
	x-cloak
	wire:key="{{ md5(collect($rows)) }}"
>
	<div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">          
		<table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
			<thead>
				<tr class="text-left">
					@isset($tableColumns)
						{{ $tableColumns }}
					@else	 
						@isset($tableTextLink)
							<th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
								{{ $tableTextLinkLabel }}
							</th>
						@endisset

						<template x-for="column in columns">
							<th 
								:class="`${column.columnClasses}`"
								class="bg-gray-50 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate" 
								x-text="column.name"></th>
						</template>

						{{-- Displays when Custom name slots for action links is shown --}}
						@isset($tableActions)
							<th class="bg-gray-50 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">{{ $actionText }}</th>
						@endisset
					@endisset
				</tr>
			</thead>
			<tbody>

				<template x-if="rows.length === 0">
					<tr>
						@isset($empty)
							<td colspan="100%" class="text-center py-1 px-4 text-sm">
								{{ $empty }}
							</td>
						@else
							<td colspan="100%" class="text-center py-10 px-4 text-sm">
								No records found
							</td>
						@endisset
					</tr>
				</template>

				<template x-for="(row, rowIndex) in rows" :key="'row-' +rowIndex">
					<tr :class="{'bg-gray-50': isStriped === true && ((rowIndex+1) % 2 === 0) }">
						@isset($tableRows)
							{{ $tableRows }}
						@else
							@isset($tableTextLink)
								<td
									class="text-gray-600 px-6 py-3 border-t border-gray-100 whitespace-nowrap">
									{{ $tableTextLink }}
								</td>
							@endisset

							<template x-for="(column, columnIndex) in columns" :key="'column-' + columnIndex">
								<td 
									:class="`${column.rowClasses}`"
									class="text-gray-600 px-6 py-3 border-t border-gray-100 whitespace-nowrap">
									<div x-text="`${row[column.field]}`" class="truncate"></div>
								</td>
							</template>

							{{-- Custom name slots for action links --}}
							@isset($tableActions)
								<td
									class="text-gray-600 px-6 py-3 border-t border-gray-100 whitespace-nowrap">
									{{ $tableActions }}
								</td>
							@endisset
						@endisset
					</tr>
				</template>

			</tbody>
		</table>
	</div>
</div>