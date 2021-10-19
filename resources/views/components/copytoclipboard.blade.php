@props(['content' => 'Content' ])

<a 
	{{
		$attributes->merge([
			"class" => "no-underline border border-gray-200 px-1 rounded text-xs uppercase tracking-wide font-semibold text-gray-500"
		])
	}}
	href="#"
	x-data="{
		isCopied: false,
		copyToClipBoard() {
			if (! navigator.clipboard) {
				textArea = document.createElement('textarea');
				textArea.value = this.$refs.content.innerHTML;

				textArea.style.top = '0';
				textArea.style.left = '0';
				textArea.style.position = 'fixed';

				document.body.appendChild(textArea);
				textArea.focus();
				textArea.select();

				try {
					if (document.execCommand('copy')) {
						this.isCopied = true;
						setTimeout(() => {
							this.isCopied = false;
						}, 2500);
					}
				} catch (err) {
					console.error('Fallback: Oops, unable to copy', err);
				}

				document.body.removeChild(textArea);
				return;
			} else {
				navigator.clipboard.writeText(this.$refs.content.innerHTML)
					.then(() => {
						this.isCopied = true;
						setTimeout(() => {
							this.isCopied = false;
						}, 2500);
					});
			}
		}  
	}"
	x-on:click.prevent="copyToClipBoard()"
	x-cloak
>
<span class="hidden" x-ref="content">{!! $content !!}</span>
<span x-text="isCopied ? 'Copied' : 'Copy'"></span></a>
