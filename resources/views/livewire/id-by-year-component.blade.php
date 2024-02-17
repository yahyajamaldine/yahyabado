<div>
    <div class="input_field full-field select_option">
        <label class="field-text">سنة الميلادية للملف</label>
        <div class="select_arrow" ></div>
          <select wire:model.change="selectedYear" id="selectedYear" name="selectedYear" required>
            @php
                $starterYear = date("Y")-1;
            @endphp
            <option selected>... اختيار</option>
            @for ($i = $starterYear; $i <= $starterYear + 3; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
    </div>
    <div class="input_field full-field select_option">
        <label class="field-text">الرقم التسلسلي                </label>
        <input type="number" name="DydocumentId" value="{{ $DydocumentId }}" readonly placeholder=" الرقم التسلسلي " required />
    </div>
    <p>{{ $tyear }}</p>
</div>
