@php
	$rows = [
		[1, "No. of pregnancies registered", "", "", "", ""],
		[2, "No. of live births", "", "", "", ""],
		[3, "No. of babies born dead", "", "", "", ""],
		[4, "No. of babies weighed within 3 days of birth", "", "", "", ""],
		[5, "Out of the above, no. of low birth weight babies (< 2500 gm)", "", "", "", ""],
		[6, "No. of neonatal deaths (within 28 days of birth)", "", "", "", ""],
		[7, "No. of post neonatal deaths (between 29 days and 12 months of birth)", "", "", "", ""],
		[8, "Total infant deaths (6 + 7)", "", "", "", ""],
		[9, "Total child deaths (1- 5 years)", "", "", "", ""],
		[10, "No. of deaths of women during pregnancy", "", "", "", ""],
		[11, "No. of deaths of women during delivery", "", "", "", ""],
		[12, "No. of deaths of women within 42 days of delivery", "", "", "", ""],
	];
@endphp

<div
	x-data='{
		columns: [
			{
				"name":"Sl No", 
				"subcolumns": [{"name":""}]
			},
			{
				"name":"Categories", 
				"subcolumns": [{"name":""}]
			},
			{
				"name":"Among Residents of WC Area", 
				"subcolumns": [
					{"name": "Girls/Women"},
					{"name": "Boys"}
				]
			},
			{
				"name":"Among Temporary Residents of WC Area", 
				"subcolumns": [
					{"name": "Girls/Women"},
					{"name": "Boys"}
				]
			}
		],

		rows: @json($rows),

		subHeaders() {
			var subs = [];
			this.columns.forEach(function (col) {
				col.subcolumns.forEach(function (sub) {
					if (sub.name.length == 0) return;
					subs.push(sub);
				});
			});
			return subs;
		}
	}'
	x-cloak
>
	<div>
		<table class="w-full">
			<thead>
				<tr>	 
					<template x-for="data in columns">
						<th class="whitespace-nowrap border border-gray-200 px-4 py-2 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider" :rowspan="data.subcolumns.length == 1 ? 2 : 'auto'" :colspan="data.subcolumns.length" x-text="data.name"></th>
					</template>
				</tr>
				<tr>
					<template x-for="data in subHeaders()">
						<th class="whitespace-nowrap border-b border-l border-r relative border-gray-200 px-4 py-2 bg-gray-50 text-left text-xs leading-4 font-semibold text-gray-600 uppercase tracking-wider" x-text="data.name"></th>
					</template>
				</tr>
			</thead>
			<tbody>
				<template x-for="(row, rowIndex) in rows">
					<tr>
						<template x-for="(rowChild, rowChildIndex) in row">
							<td class="border px-4 py-1 text-sm" x-text="rowChild"></td>
						</template>
					</tr>
				</template>
			</tbody>
		</table>
	</div>
</div>

 